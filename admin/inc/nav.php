<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Apex Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active  text-white" aria-current="page" href="index.php"><i class="fa fa-home"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active  text-white" aria-current="page" href="addgallery.php"><i class="fa fa-camera"></i>Add Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white" href="addstudent.php"><i class="fa fa-user"></i>Add Student</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i> Create Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="createcat.php">Create Category</a></li>
                        <li><a class="dropdown-item" href="createcourse.php">Create Course</a></li>

                    </ul>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="nav-link  text-white" href="logout.php"><i class="fa fa-home"></i>Log out</a>
                </li>

            </ul>
        </div>
    </div>
</nav>