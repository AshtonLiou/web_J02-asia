<?php include_once "./api/db.php";

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

            <img src="./img/banner_home.jpg" alt="bannerImg">

            <div class="bannerBody">

                <!-- header -->

                <header class="d-flex justify-content-center align-items-center">
                    <nav class="d-flex">
                        <h2 class="text-white my-auto mx-5 text-center">AbuDhabi<span
                                style="color: var(--green);">Terhal</span></h2>
                        <div class="nav d-flex justify-content-center">
                            <a href="./home.php" class="activeNav">Home</a>
                            <a href="./attractions.php">Attractions</a>
                            <a href="./gallery.php">Gallery</a>
                            <a href="./aboutus.php">About Us</a>
                            <a href="./contact.php">Contact</a>
                        </div>
                    </nav>
                </header>

                <div class="abuDhabiText container text-center text-white my-5">
                    <p style="letter-spacing: .1em;">LET US ENCOURAGE YOU TO VISIT THE CITY</p>
                    <h1 style="font-size: 3em;">Welcome to Abu Dhabi</h1>
                </div>

                <div class="searchPlace container text-center">
                    <label for="searchInput">Search for a place</label>
                    <div class="searchBox">
                        <input type="text" id="searchInput" class="col-8 shadow" list="placeName"
                            placeholder="Place Name" v-model="data.searchPlaceInput">
                        <datalist id="placeName">
                            <option v-for="item in data.allDispData" :value="item.title"></option>
                        </datalist>
                        <button class="btn rootBtn col-3" @click="searchPlace">SEARCH</button>
                    </div>
                </div>

            </div>

        </div>

        <!-- main -->

        <main>

            <div class="container text-center mt-5">
                <p style="letter-spacing: .1em;">TOP 6 ABU DHABI TOURIST ATTRACTIONS</p>
                <h1>Explore and be Inspired</h1>
                <div class="row row-cols-2 row-cols-md-3">
                    <div class="col my-3" v-for="(item, idx) in data.dispData">
                        <div class="card h-100">
                            <img :src="item.img" alt="" class="card-img-top bg-dark w-100 h-50">
                            <div class="card-body">
                                <h3 class="card-title" style="color: var(--green);">{{ item.title }}</h3>
                                <hr>
                                <p class="card-text" style="font-weight: 600;">{{ item.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn rootBtn m-5" @click="data.isViewAll = !data.isViewAll; getPlaceData()"
                    v-text="data.isViewAll ? 'VIEW LESS ATTRACTIONS' : 'VIEW ALL ATTRACTIONS'"
                    v-show="!data.isSearchPlace"></button>
                <button class="btn rootBtn m-5" onclick="location.href = './home.php'" v-show="data.isSearchPlace">Go
                    Back To Home</button>
            </div>

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
                    dispData: [],
                    allDispData: [],
                    searchURL: new URLSearchParams(location.search).get("search")
                })

                const getPlaceData = () => {
                    if ($.isEmptyObject(data.searchURL)) {
                        $.getJSON("./api/get.php", { mode: "getPlaceData" }, (r) => {
                            data.allDispData = r
                            if (data.isViewAll) {
                                data.dispData = r
                            } else {
                                data.dispData = r.slice(0, 6)
                            }
                        })
                    }
                }

                const searchPlace = () => {
                    $.getJSON("./api/get.php", { mode: "getSearchPlaceData", title: data.searchPlaceInput }, (r) => {
                        if (r.length > 0) {
                            location.href = "?search=" + data.searchPlaceInput
                        }
                    })
                }

                const getSearchPlace = () => {
                    $.getJSON("./api/get.php", { mode: "getSearchPlaceData", title: data.searchURL }, (r) => {
                        if (!$.isEmptyObject(data.searchURL)) {
                            if (data.isViewAll) {
                                data.dispData = r
                                data.isSearchPlace = true
                            } else {
                                data.dispData = r.slice(0, 6)
                                data.isSearchPlace = true
                            }
                        }
                    })
                }

                onMounted(() => {
                    getPlaceData()
                    getSearchPlace()
                })

                return {
                    data,
                    getPlaceData,
                    searchPlace,
                    getSearchPlace
                }

            }
        }).mount("#app")

    </script>

</body>

</html>