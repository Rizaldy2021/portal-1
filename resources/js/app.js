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

new VanillaContextMenu({
    scope: document.getElementById("file-explorer"),
    menuItems: [
        {
            label: "Buat Folder",
            callback: () => {
                console.log("Buat Folder");

                window.dispatchEvent(
                    new CustomEvent("open-modal", {
                        detail: "new-folder-modal",
                    })
                );
            },
        },
        {
            label: "Upload File",
            callback: () => {
                console.log("Upload File");

                window.dispatchEvent(
                    new CustomEvent("open-modal", {
                        detail: "file-upload-modal",
                    })
                );
            },
        },
    ],
    transitionDuration: 75,
    theme: "white",
    customClass: "custom-context-menu-cls",
});

const folderCards = document.querySelectorAll(".folder-card");

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

document.addEventListener("DOMContentLoaded", () => {
    const openButton = document.getElementById("open-modal");
    const modal = document.getElementById("add-user-modal");
    const closeButton = document.getElementById("close-add-modal");

    // Open the modal
    if (openButton && modal) {
        openButton.addEventListener("click", () => {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        });
    }

    // Close the modal
    if (closeButton && modal) {
        closeButton.addEventListener("click", () => {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        });
    }
});
