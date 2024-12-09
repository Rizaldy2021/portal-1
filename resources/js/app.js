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
                document.dispatchEvent(new CustomEvent("open-folder-modal"));
            },
        },
        {
            label: "Upload File",
            callback: () => {
                console.log("Upload File");
            },
        },
    ],
    transitionDuration: 75,
    theme: "white",
    customClass: "custom-context-menu-cls",
});
