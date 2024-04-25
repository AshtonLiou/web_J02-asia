<div class="container text-center mt-5">
    <h1>Add a New Place</h1>
    <form method="post" id="addPlaceForm">
        <input type="text" name="title" class="col-10 mx-auto mt-4 shadow" placeholder="Title" v-model="data.addNewTitle" required>
        <textarea name="description" cols="30" rows="10" class="col-10 mx-auto mt-4 shadow" v-model="data.addNewDescription" placeholder="Description"
            required></textarea>
        <input type="file" id="file" name="uploadImage" class="col-10 mx-auto mt-4 shadow" required accept="image/*" @change="upLoadImage">
        <button type="button" class="btn rootBtn col-3 mt-4 mb-5" @click="addPlaceSubmit">ADD PLACE</button>
    </form>
</div>