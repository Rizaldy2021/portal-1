import VanillaContextMenu from "vanilla-context-menu";

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

document.addEventListener("DOMContentLoaded", () => {
    console.log("DOMContentLoaded");
});

folderCards.forEach((folderCard) => {
    new VanillaContextMenu({
        scope: folderCard,
        menuItems: [
            {
                label: "Rename Folder",
                callback: () => {
                    console.log("Rename Folder");

                    const folderId = folderCard.getAttribute("data-folder-id");
                    const folderName =
                        folderCard.getAttribute("data-folder-name");
                    const updateUrlTemplate =
                        folderCard.getAttribute("data-update-url");
                    const updateUrl = updateUrlTemplate.replace(
                        ":folder_id",
                        folderId
                    );

                    console.log({ folderId, folderName, updateUrl });

                    const form = document.getElementById("rename-folder-form");

                    if (!form) {
                        console.error("Form element not found!");
                        return;
                    }

                    form.action = updateUrl;
                    document.getElementById("modal-folder-id").value = folderId;
                    document.getElementById("modal-folder-name").value =
                        folderName;

                    window.dispatchEvent(
                        new CustomEvent("open-modal", {
                            detail: "rename-folder-modal",
                        })
                    );
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
