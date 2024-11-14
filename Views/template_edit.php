<dialog class="p-2">
    <button autofocus class="border-0 px-3 py-1 bg-yellow-500 rounded" style="position:absolute;right:1%;"><i class="fa-solid fa-x rounded text-md"></i></button>
    <div id="form-container"></div>
</dialog>

<script>
    const dialog = document.querySelector("dialog");
    const closeButton = document.querySelector("dialog button");

    // "Close" button closes the dialog
    closeButton.addEventListener("click", () => {
        let imgContainer = document.getElementById('imgContainer');
        imgContainer.innerHTML = '';
        dialog.close();
    });
    function viewImage(param){
        let form = document.getElementById('form-container');

        
        // img.src = param;
        // imgContainer.appendChild(img);
        // dialog.showModal();
        // console.log(param)
}
</script>