<?php include 'header.php'; ?>
<div>
    <marquee class="marquee" behavior="" direction="left" ><p>ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||</p></marquee>
</div>
<section class="aboutus">
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5>Gallary</h5>
                
            </div>
            <div class="row" >
            <?php 
                    $sql='SELECT * FROM gallary WHERE status=1';
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($res)){
                        $image1[]=$row;  
                    }
                    foreach ($image1 as $key => $value) {
                      ?>
                       <div class="col-lg-4 col-md-6 mb-4">
                    <img class="img-fluid" src="admin/uploads/<?php echo $value['image']; ?>" id="imgg" alt="">
                </div>
                <?php
                    }
                ?> 
               
                
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>