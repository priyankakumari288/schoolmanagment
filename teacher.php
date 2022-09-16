<?php include 'header.php'; ?>
<div>
    <marquee class="marquee" behavior="" direction="left">
        <p>ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||ओ३म्। भूर्भुवः स्वः। तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि। धियो यो नः प्रचोदयात्।।||</p>
    </marquee>
</div>
<br>
<section>

    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto table-responsive">
                <h3><b><u>Teacher Faculty</u></b></h3><br>
            </div>
        </div>
        <div class="row">

            <div class="col-md-10 m-auto table-responsive">
                <table class="table table-striped" border="2 solid black">
                    <thead>
                        <tr>
                            <th colspan="11" style="font-size:18px;background-color:#06296b; color:#E4D6D6;">Teachers KVS</th>
                        </tr>
                    </thead>
                    <thead>
                </table>

                <?php
                $sql = 'SELECT * FROM teacher WHERE status=1';
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $variable[] = $row;
                }
                foreach ($variable as $key => $value) {
                ?>
                    <div class="row">
                        <div class="col-md-10">
                            <ul >
                                <li style="list-style: none;"><strong>Name </strong>:<?php echo $value['name']; ?> </li>
                                <li style="list-style: none;"><strong>Qualification</strong>:<?php echo $value['qualification']; ?> </li>
                                <li style="list-style: none;"><strong>Designation </strong>:<?php echo $value['designation']; ?> </li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <img src="admin/uploads/<?php echo $value['image']; ?>" style="height: 120px; width:120px;">
                        </div>

                    </div>
                    <hr style=" position: relative; top: 10px; border: none; height: 2px; background: orangered; margin-bottom: 30px;">
                <?php
                }
                ?>
                </thead>

            </div>
        </div>
    </div>
</section>














<?php include 'footer.php'; ?>