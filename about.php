<?php include 'header.php'; ?>
<div>
    <marquee class="marquee" behavior="" direction="left" ><p>ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||</p></marquee>
</div>

<!-- About Start -->
<section class="aboutus">
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
        <?php 
                    $sql='SELECT * FROM aboutus WHERE status=1';
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                ?>  
            <div class="col-lg-3">
                <img class="abouti img-fluid rounded mb-4 mb-lg-0" src="admin/uploads/<?php echo $row['image']; ?>" alt="">
            </div>
            <div class="col-lg-9">
                <div class="text-center mb-4">
                    
                    <h2><?php echo $row['heading']; ?></h2>
                    <br>
                    
                </div>
                <p class="aboutp"><?php echo $row['paragraph']; ?></p>
                <!-- Welcome to the site of the Kendriya Vidyalayas Sangathan, Regional Office, Ranchi. Kendriya Vidyalayas, a premier organization in India administering more than 1247 schools, more than 13 lakhs students and more than 56 thousands employees including outsourced. <br>
                    <br>
                    Since inception in 1963, the Kendriya Vidyalayas (Central Schools) have come to be known as centres of excellence in the field of secondary and senior secondary education promoting national integration and a sense of ''Indianness'' among the children while ensuring their total personality development and academic excellence. <br>
                    <br>
                    There are 42 KVs including KV Hinoo, Ranchi with double shift, under the jurisdiction of KVS RO Ranchi. <br>
                    <br>
                    There is a common syllabus and bilingual instruction in all schools. They are all co-educational. Sanskrit is taught as a compulsory subject from classes VI to VIII and as an optional subject until class XII, and these days students can elect French, German or the regional language of the resident Indian state.
                -->
            </div>
        </div>
    </div>
</div>
</section>
<!-- About End -->

<?php include 'footer.php'; ?>