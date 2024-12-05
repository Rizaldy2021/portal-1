import "./bootstrap";
import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const inputElement = document.querySelector('input[type="file"].filepond');

const csrfToken = document.head
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

FilePond.create(inputElement, {
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
});
