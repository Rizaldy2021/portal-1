import "./bootstrap";
import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import VanillaContextMenu from "vanilla-context-menu";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";

Alpine.plugin(focus);

window.Alpine = Alpine;

Alpine.start();

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

setTimeout(() => {
    console.log("Users Index: Executing manually after delay.");
}, 1000);

console.log(window.location.pathname);
console.log(typeof document.addEventListener);

document.addEventListener("DOMContentLoaded", () => {
    window.editUser = function (userId) {
        console.log("editUser called with ID:", userId);

        const userCard = document.querySelector(
            `.user-card[data-user-id='${userId}']`
        );

        if (!userCard) {
            console.error("User card not found for ID:", userId);
            return;
        }

        const userName = userCard.getAttribute("data-user-name");
        const userEmail = userCard.getAttribute("data-user-email");
        const password = userCard.getAttribute("data-user-password");

        const updateUrlTemplate = userCard.getAttribute("data-update-url");
        const updateUrl = updateUrlTemplate.replace(":user_id", userId);

        console.log({
            userId,
            userName,
            userEmail,
            password,
            updateUrl,
        });

        console.log(
            "Opening modal for user:",
            userName,
            userEmail,
            password,
            userId
        );

        const form = document.getElementById("edit-user-form");

        form.action = updateUrl;
        document.getElementById("modal-user-id").value = userId;
        document.getElementById("modal-user-name").value = userName;
        document.getElementById("modal-user-email").value = userEmail;
        document.getElementById("modal-user-password").value = password;

        // Buka modal dengan Alpine.js
        window.dispatchEvent(
            new CustomEvent("open-modal", {
                detail: "edit-user-modal",
            })
        );
    };
});
