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

window.handleRenameFolder = function (folderCard) {
    const folderId = folderCard.getAttribute("data-folder-id");
    const folderName = folderCard.getAttribute("data-folder-name");
    const updateUrlTemplate = folderCard.getAttribute("data-update-url");
    const updateUrl = updateUrlTemplate.replace(":folder_id", folderId);

    const form = document.getElementById("rename-folder-form");

    if (!form) {
        console.error("Rename form not found!");
        return;
    }

    form.action = updateUrl;
    document.getElementById("modal-folder-id").value = folderId;
    document.getElementById("modal-folder-name").value = folderName;

    window.dispatchEvent(
        new CustomEvent("open-modal", {
            detail: "rename-folder-modal",
        })
    );
};

window.handleDeleteFolder = function (folderCard) {
    const folderId = folderCard.getAttribute("data-folder-id");
    const updateUrlTemplate = folderCard.getAttribute("data-update-url");
    const updateUrl = updateUrlTemplate.replace(":folder_id", folderId);
    const folderName = folderCard.getAttribute("data-folder-name");

    openDeleteModal({
        title: "Delete Folder",
        message: `Are you sure you want to delete folder: ${folderName}?`,
        actionUrl: updateUrl,
        itemId: folderId,
    });
};

document.querySelectorAll(".rename-folder-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
        const folderCard = btn.closest(".folder-card");
        window.handleRenameFolder(folderCard);
    });
});

document.querySelectorAll(".delete-folder-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
        const folderCard = btn.closest(".folder-card");
        window.handleDeleteFolder(folderCard);
    });
});

folderCards.forEach((folderCard) => {
    new VanillaContextMenu({
        scope: folderCard,
        menuItems: [
            {
                label: "Rename Folder",
                callback: () => {
                    handleRenameFolder(folderCard);
                },
            },
            {
                label: "Hapus Folder",
                callback: () => {
                    handleDeleteFolder(folderCard);
                },
            },
        ],
        transitionDuration: 75,
        theme: "white",
        customClass: "custom-context-menu-cls",
    });
});
