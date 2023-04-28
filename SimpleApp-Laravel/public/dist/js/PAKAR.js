    
    //start -- upload file
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");
  
    dropZoneElement.addEventListener("click", (e) => {
      inputElement.click();
    });
  
    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateThumbnail(dropZoneElement, inputElement.files[0]);
      }
    });
  
    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("drop-zone--over");
    });
  
    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });
  
    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();
  
      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;
        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
      }
  
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });
  
  /**
   * Updates the thumbnail on a drop zone element.
   *
   * @param {HTMLElement} dropZoneElement
   * @param {File} file
   */
  function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
  
    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
      dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }
  
    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
      thumbnailElement = document.createElement("div");
      thumbnailElement.classList.add("drop-zone__thumb");
      dropZoneElement.appendChild(thumbnailElement);
    }
  
    thumbnailElement.dataset.label = file.name;
  
    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();
  
      reader.readAsDataURL(file);
      reader.onload = () => {
        thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
      };
    } else {
      thumbnailElement.style.backgroundImage = null;
    }
  }
  //end -- upload file

  //start -- upload profile pic
  $(document).on("change", ".uploadProfileInput", function () {
    var triggerInput = this;
    var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
    var holder = $(this).closest(".pic-holder");
    var wrapper = $(this).closest(".profile-pic-wrapper");
    $(wrapper).find('[role="alert"]').remove();
    triggerInput.blur();
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) {
      return;
    }
    if (/^image/.test(files[0].type)) {
      // only image file
      var reader = new FileReader(); // instance of the FileReader
      reader.readAsDataURL(files[0]); // read the local file
  
      reader.onloadend = function () {
        $(holder).addClass("uploadInProgress");
        $(holder).find(".pic").attr("src", this.result);
        $(holder).append(
          '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
        );
  
        // Dummy timeout; call API or AJAX below
        setTimeout(() => {
          $(holder).removeClass("uploadInProgress");
          $(holder).find(".upload-loader").remove();
          // If upload successful
          if (Math.random() < 0.9) {
            $(wrapper).append(
              //'<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
            );
  
            // Clear input after upload
            $(triggerInput).val("");
  
            setTimeout(() => {
              $(wrapper).find('[role="alert"]').remove();
            }, 3000);
          } else {
            $(holder).find(".pic").attr("src", currentImg);
            $(wrapper).append(
              '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
            );
  
            // Clear input after upload
            $(triggerInput).val("");
            setTimeout(() => {
              $(wrapper).find('[role="alert"]').remove();
            }, 3000);
          }
        }, 1500);
      };
    } else {
      $(wrapper).append(
        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
      );
      setTimeout(() => {
        $(wrapper).find('role="alert"').remove();
      }, 3000);
    }
  });
  //end -- upload profile pic


  
  