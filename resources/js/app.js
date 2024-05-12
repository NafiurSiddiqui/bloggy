import "./bootstrap";
import "@fortawesome/fontawesome-free/js/fontawesome";
import "@fortawesome/fontawesome-free/js/solid";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

//for handling multiple selection for bulk delete
const bulkDeleteCheckbox = document.getElementById("bulk_delete");
const selectColumnHeader = document.querySelector(".select-column");
const selectRow = document.querySelector(".bulk-delete-selection");
const iconMultipleSelection = document.querySelector(
    ".multiple-selection-btns"
);
const bulkDeleteBtn = document.querySelector(".bulk-delete-btn");
let bulkDeleteIsChecked = false;

bulkDeleteCheckbox.addEventListener("change", () => {
    bulkDeleteIsChecked = bulkDeleteCheckbox.checked;

    if (bulkDeleteIsChecked) {
        selectColumnHeader.classList.remove("hidden");
        selectRow.classList.remove("hidden");
        iconMultipleSelection.classList.add("text-blue-500");
        bulkDeleteBtn.classList.add("shadow");
    } else {
        selectColumnHeader.classList.add("hidden");
        selectRow.classList.add("hidden");
        iconMultipleSelection.classList.remove("text-blue-500");
        bulkDeleteBtn.classList.remove("shadow");
    }
});
