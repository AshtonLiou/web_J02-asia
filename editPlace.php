<div class="container text-center mt-5">
    <h1>Edit Place</h1>
    <form method="post" id="editPlaceForm">
        <input type="text" name="title" class="col-10 mx-auto mt-4 shadow" placeholder="editTitle" v-model="data.editTitle"
            required>
        <textarea name="description" cols="30" rows="10" class="col-10 mx-auto mt-4 shadow" v-model="data.editDescription"
            placeholder="Description" required></textarea>
        <input type="file" id="file" name="uploadImage" class="col-10 mx-auto mt-4 shadow" required accept="image/*"
            @change="upLoadImage">
        <button type="button" class="btn rootBtn col-3 mx-3 mt-4 mb-5" @click="editPlaceSubmit(<?= $g["edit"] ?>)">UPDATE</button>
        <button type="button" class="btn rootBtn col-3 mx-3 mt-4 mb-5" onclick="location.search='?page=manage-place'">CANCEL</button>
    </form>
</div>