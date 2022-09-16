<?php include 'header.php'; ?>

<section>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $sql = "select * from banner where status='1'";
            $res = mysqli_query($conn, $sql);
            $sn = 0;
            while ($row = mysqli_fetch_assoc($res)) {
                $sn++;
            ?>
                <div class="carousel-item <?php if ($sn == 1) {
                                                echo 'active';
                                            } ?>">
                    <img class="d-block w-100" style="height: 400px" src="admin/uploads/<?= $row['image']; ?>" alt="<?= $row['image']; ?>">
                </div>
            <?php } ?>

        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</section>
<div>
    <marquee class="marquee" behavior="" direction="left">
        <p>ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||</p>
    </marquee>
</div>

<!-- about us start -->
<section>
    <div class="container py-5">
        <div class="row align-items-center">
            <?php
            $sql = 'SELECT * FROM about WHERE status=1';
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            ?>
            <div class="col-md-5">
                <img class="ab img-thumbnail" src="admin/uploads/<?php echo $row['image']; ?>" style="height: 350px; width:350px" alt="">
            </div>
            <div class="col-md-7 alll">
                <div class="text-left mb-4">
                    <h5><?php echo $row['heading']; ?></h5>
                    <h1><?php echo $row['title']; ?></h1>
                </div>
                <p class="aboutp"><?php echo $row['paragraph']; ?></p>
                <!-- <p>Kendriya Vidyalaya is a system of central government schools under the Ministry
                    of Education , Government of India. The system came into being in 1963 under the
                    name "Central Schools" and has been affiliated with CBSE since then. Later, the
                    name was changed to Kendriya Vidyalaya.
                    Kendriya Vidyalaya, Latehar was established on 01.04.2007 about 2 KM. from Latehar
                    Bus Stand. It has large area. It running on a grand building having spacious
                    classrooms, big library of good books, well equipped computer labs, a leveled
                    playground for all round development of child's personality. It is a co-educational
                    institution from I to XII.</p> -->
                <!-- <a href="about.php">Learn More</a> -->

            </div>
        </div>
    </div>
</section>
<!----- about us end ------>

<!---- principal start ---->
<section class="principal">
    <div class="container py-5">
        <div class="row align-items-center">
            <?php
            $sql = 'SELECT * FROM principalhome WHERE status=1';
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            ?>
            <div class="col-md-7">
                <div class="text-left mb-4">
                    <h1><?php echo $row['title']; ?></h1>
                    <h5><?php echo $row['heading']; ?></h5>
                </div>
                <p class="aboutp"><?php echo $row['paragraph']; ?><a href="principaldesk.php">Read more>></a></p>
                <!-- <p>Welcome to Kendriya Vidyalaya Latehar. The aim of the school is to provide unmatched qualitative education par excellence: to develop the best that is latent in children and to encourage the child to explore and revel in the joy of learning. The endeavor is to retain smiles on the faces of the children, channelize the energies of youthfulness while sensing the beautiful connectivity between the heart, character, nation and the world.</p> -->

            </div>
            <div class="col-md-5">
                <img class="img-fluid rounded mb-4 mb-lg-0 img-thumbnail" src="admin/uploads/<?php echo $row['image']; ?>" style="height: 350px; width:350px" alt="">
            </div>
        </div>
    </div>
</section>

<!-- gallery -->
<section class="gallery">
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5>Gallary</h5>

            </div>
            <div class="row">
                <?php
                $sql = 'SELECT * FROM gallaryhome WHERE status=1';
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $image1[] = $row;
                }
                foreach ($image1 as $key => $value) {
                ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <img class="img-fluid " src="admin/uploads/<?php echo $value['image']; ?>" id="imgg" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>