<?php include_once "./api/db.php";

    if (!isset($_SESSION["isLogin"])) {
        header("location: ./login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbuDhabiTerhal</title>
    <link rel="stylesheet" href="./jquery/jquery-ui.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./img/admin.jpg" type="image/x-icon">
</head>

<body>

    <div id="app">

        <!-- top header -->

        <?php include_once "./header.php" ?>

        <!-- banner -->

        <div class="banner">

            <img src="./img/image8.jpg" alt="bannerImg">

            <div class="bannerBody">

                <!-- header -->

                <header class="d-flex justify-content-center align-items-center">
                    <nav class="d-flex">
                        <h2 class="text-white my-auto mx-5 text-center">AbuDhabi<span
                                style="color: var(--green);">Terhal</span></h2>
                        <div class="nav d-flex justify-content-center">
                            <a href="./home.php">Home</a>
                            <a href="./attractions.php">Attractions</a>
                            <a href="./gallery.php">Gallery</a>
                            <a href="./aboutus.php">About Us</a>
                            <a href="./contact.php">Contact</a>
                        </div>
                    </nav>
                </header>

                <div class="adminPlace container text-center my-5">
                    <label>Hello Admin!</label>
                    <div class="adminBox">
                        <a class="btn rootBtn col-4" href="?page=add-place">ADD PLACE</a>
                        <a class="btn rootBtn col-4" href="?page=manage-place">MANAGE PLACES</a>
                        <a class="btn dangerBtn col-3" href="./api/logout.php">LOGUOT</a>
                    </div>
                </div>

            </div>

        </div>

        <!-- main -->

        <main>

            <?php
                $page = $g["page"]??"add-place";
                switch ($page) {
                    case "add-place":
                        include_once "./addPlace.php";
                        break;
                    case "manage-place":
                        include_once "./managePlace.php";
                        break;
                    case "edit-place":
                        include_once "./editPlace.php";
                        break;
                }
            ?>

        </main>

        <!-- footer -->

        <?php include_once "./footer.php" ?>

    </div>

    <!-- script -->

    <script src="./jquery/jquery.js"></script>
    <script src="./jquery/jquery-ui.min.js"></script>
    <script src="./jquery/vue3.global.js"></script>
    <script src="./bootstrap/bootstrap.js"></script>
    <script>

        const { createApp, reactive, onMounted } = Vue

        createApp({
            setup() {

                const data = reactive({
                    data: []
                })

                const upLoadImage = () => {
                    let file = $("#file").prop("files")[0]
                    if (file) {
                        let reader = new FileReader()
                        reader.onload = (e) => {
                            data.addNewImg = e.target.result
                            data.editImg = e.target.result
                        }
                        reader.readAsDataURL(file)
                    }
                }

                const addPlaceSubmit = () => {
                    if ($("#addPlaceForm")[0].reportValidity()) {
                        $.post("./api/post.php", { mode: "addPlace", title: data.addNewTitle, description: data.addNewDescription, img: data.addNewImg }, () => {
                            alert("add place successfully!")
                            location.reload()
                        })
                    }
                }

                const getPlaceData = () => {
                    $.getJSON("./api/get.php", { mode: "getPlaceData" }, (r) => {
                        data.data = r
                    })
                }

                const editRecord = (id) => {
                    location.href = "?page=edit-place&edit=" + id
                }

                const delRecord = (id) => {
                    data.data.find((item) => item.id == id).chDel = true
                }

                const unDel = (id) => {
                    data.data.find((item) => item.id == id).chDel = false
                }

                const confDel = (id) => {
                    $.post("./api/post.php", { mode: "delPlace", id }, () => {
                        data.data.find((item) => item.id == id).confdelAnimation = true
                        setTimeout(() => {
                            getPlaceData()
                        }, 200)
                    })
                }

                const getEditData = () => {
                    $.getJSON("./api/get.php", { mode: "getEditData", id: new URLSearchParams(location.search).get("edit") }, (item) => {
                        data.editTitle = item.title
                        data.editDescription = item.description
                    })
                }

                const editPlaceSubmit = (id) => {
                    if ($("#editPlaceForm")[0].reportValidity()) {
                        $.post("./api/post.php", { mode: "editPlace", id, title: data.editTitle, description: data.editDescription, img: data.editImg }, () => {
                            location.search = "?page=manage-place"
                        })
                    }
                }

                onMounted(() => {
                    getPlaceData()
                    getEditData()
                })

                return {
                    data,
                    upLoadImage,
                    addPlaceSubmit,
                    getPlaceData,
                    editRecord,
                    delRecord,
                    unDel,
                    confDel,
                    editPlaceSubmit,
                    getEditData
                }
            }
        }).mount("#app")

    </script>

</body>

</html>