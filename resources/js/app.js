import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Drop files here to upload",
    acceptedFiles: ".jpg,.png,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Remove",
    maxFilesize: 1,
    uploadMultiple: false,
});
