import "./bootstrap";
import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import VanillaContextMenu from "vanilla-context-menu";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const inputElement = document.querySelector('input[type="file"].filepond');

if (inputElement) {
    const csrfToken = document.head
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    const pond = FilePond.create(inputElement, {
        server: {
            process: {
                url: "/upload",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            },
        },
        allowMultiple: true,
        dropOnElement: true,
        // allowProcessment: false,
    });

    console.log("FilePond initialized:", pond);

    // Drop zone logic
    const dropElement = document.querySelector("main");

    if (dropElement) {
        console.log("Drop zone found:", dropElement);

        // Prevent default drag behaviors
        ["dragenter", "dragover", "dragleave", "drop"].forEach((event) => {
            dropElement.addEventListener(event, (e) => {
                e.preventDefault();
                e.stopPropagation();
                console.log(`Event ${event} triggered`);
            });
        });

        // Highlight drop zone on drag over
        dropElement.addEventListener("dragover", () => {
            dropElement.classList.add("highlight");
            console.log("Drag over drop zone");
        });

        // Remove highlight on drag leave or drop
        ["dragleave", "drop"].forEach((event) => {
            dropElement.addEventListener(event, () => {
                dropElement.classList.remove("highlight");
                console.log(`Event ${event}: highlight removed`);
            });
        });

        // Handle file drop
        dropElement.addEventListener("drop", (e) => {
            const files = e.dataTransfer.files;
            console.log("Files dropped:", files);

            if (files.length > 0) {
                pond.addFiles(files);
                console.log("Files added to FilePond");
            } else {
                console.error("No files found in drop event");
            }
        });
    } else {
        console.error("Drop zone element not found");
    }
} else {
    console.error("File input element not found");
}

function showModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    } else {
        console.error(`Modal with ID '${modalId}' not found.`);
    }
}

function hideModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    } else {
        console.error(`Modal with ID '${modalId}' not found.`);
    }
}

function initializeModal(modalId, closeButtonId, cancelButtonId) {
    const modal = document.getElementById(modalId);
    const closeModalButton = document.getElementById(closeButtonId);
    const cancelModalButton = document.getElementById(cancelButtonId);

    if (closeModalButton) {
        closeModalButton.addEventListener("click", () => hideModal(modalId));
    } else {
        console.error(`Close button with ID '${closeButtonId}' not found.`);
    }

    if (cancelModalButton) {
        cancelModalButton.addEventListener("click", () => hideModal(modalId));
    } else {
        console.error(`Cancel button with ID '${cancelButtonId}' not found.`);
    }
}

new VanillaContextMenu({
    scope: document.getElementById("file-explorer"),
    menuItems: [
        {
            label: "Buat Folder",
            callback: () => {
                console.log("Buat Folder");

                const modal = document.getElementById("new-folder-modal");
                if (modal) {
                    modal.classList.remove("hidden");
                    modal.classList.add("flex");
                }

                const closeModalButton = document.getElementById("close-modal");
                const cancelModalButton =
                    document.getElementById("cancel-modal");
                if (closeModalButton && cancelModalButton) {
                    closeModalButton.addEventListener("click", () => {
                        modal.classList.add("hidden");
                        modal.classList.remove("flex");
                    });
                    cancelModalButton.addEventListener("click", () => {
                        modal.classList.add("hidden");
                        modal.classList.remove("flex");
                    });
                }
            },
        },
        {
            label: "Upload File",
            callback: () => {
                console.log("Upload File");

                const modal = document.getElementById("new-file-modal");
                if (modal) {
                    modal.classList.remove("hidden");
                    modal.classList.add("flex");
                }

                const closeModalButton =
                    document.getElementById("close-file-modal");

                closeModalButton.addEventListener("click", () => {
                    modal.classList.add("hidden");
                    modal.classList.remove("flex");
                });
            },
        },
    ],
    transitionDuration: 75,
    theme: "white",
    customClass: "custom-context-menu-cls",
});

folderCards = document.querySelectorAll(".folder-card");

folderCards.forEach((foldercard) => {
    new VanillaContextMenu({
        scope: foldercard,
        menuItems: [
            {
                label: "Rename Folder",
                callback: () => {
                    console.log("Rename Folder");
                },
            },
            {
                label: "Hapus Folder",
                callback: () => {
                    console.log("Hapus Folder");
                },
            },
        ],
        transitionDuration: 75,
        theme: "white",
        customClass: "custom-context-menu-cls",
    });
});
