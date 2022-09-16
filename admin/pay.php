<html>

<head>

</head>

<body>
    <div class="row">
        <div class="col-md-6">
            <div id="pays">
                <table class="table-hover table-striped table-bordered table-condensed" style="width:100%;" id="myTable">
                    <!--beginning of table-->
                    <tbody>
                        <tr>
                            <td width="100"><b>Serial no.</b></td>
                            <td><b>Payment</b></td>
                            <td><b>Payment Rs.</b></td>
                        </tr>
                        <tr>
                            <td width="95">01</td>
                            <td>Admission</td>
                            <td><input type="number" name="admissionfee" id="admfee" onkeyup="find_total()"></td>
                        </tr>
                        <tr>
                            <td width="95">02</td>
                            <td>Tution Fee</td>
                            <td><input type="number" name="tutionfee" id="tutionfee" onkeyup="find_total()"></td>
                        </tr>
                        <tr>
                            <td width="95">03</td>
                            <td> Late Fine</td>
                            <td><input type="number" name="latefee" id="latefine" onkeyup="find_total()"></td>
                        </tr>
                        <tr>
                            <td width="95">04</td>
                            <td>Examination Fee </td>
                            <td><input type="number" name="examinationfee" id="examfee" onkeyup="find_total()"></td>
                        </tr>
                        <tr>
                            <td width="95">05</td>
                            <td> Game/Sports Fee</td>
                            <td><input type="number" name="gamefee" id="gamefee" onkeyup="find_total()"></td>
                        </tr>
                        <tr>
                            <td width="95">06</td>
                            <td>Books and Stationary </td>
                            <td><input type="number" name="bookfee" id="bookfee" onkeyup="find_total()"></td>
                        </tr>
                        <tr>
                            <td width="95">07</td>
                            <td>Library Fee </td>
                            <td><input type="number" name="libraryfee" id="libraryfee" onkeyup="find_total()"></td>
                        </tr>
                        <tr>
                            <td width="95">08</td>
                            <td>Computer Fee </td>
                            <td><input type="number" name="computerfee" id="computerfee" onkeyup="find_total()"></td>
                        </tr>

                        <tr>
                            <td width="400" colspan="2" style="text-align:right"><b>Total : &nbsp;&nbsp;</b></td>
                            <td><input type="text" name="total" class="tot" width="80" id="total" readonly="" required=""></td>

                        </tr>
                        <tr>
                            <td width="400" colspan="2" style="text-align:right"><b>Paid : &nbsp;&nbsp;</b></td>
                            <td><input type="number" name="paid" class="paid" onkeyup="paiddetais()" width="90" id="paid" required=""></td>

                        </tr>
                        <tr>
                            <td width="400" colspan="2" style="text-align:right"><b>Due : &nbsp;&nbsp;</b></td>
                            <td><input type="number" name="due" class="due" width="80" id="due" readonly="" required=""></td>

                        </tr>
                    </tbody>
                </table>
                <!--end of table-->

            </div>
        </div>
        <!-- payment close -->
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4 mb-4"><label>Name:</label> </div>
                <div class="col-md-8"><input type="text" name="studentname" id="monthlyname" readonly placeholder="Full Name" class="form-control"> </div>

            </div>
            <div class="row">
                <div class="col-md-4 mb-4"><label>Fathers Name:</label> </div>
                <div class="col-md-8"><input type="text" name="fathers" id="monthlyfathers" readonly placeholder="Full Name" class="form-control"> </div>

            </div>

            <div class="row">
                <div class="col-md-4 mb-4"><label>Address:</label> </div>
                <div class="col-md-8"><input type="text" name="address" id="monthlyaddress" readonly placeholder="Full Name" class="form-control"> </div>

            </div>

            <div class="row">
                <div class="col-md-4 mb-4"><label>Class:</label> </div>
                <div class="col-md-8">
                    <select id="monthlyclass" name="class" readonly class="form-control">
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4"><label>Rollno.:</label> </div>
                <div class="col-md-8"><input type="number" name="roll" id="monthlyrollno" readonly placeholder="Full Name" class="form-control"> </div>

            </div>

            <div class="row">
                <div class="col-md-4 mb-4"><label>Session:</label> </div>
                <div class="col-md-8">
                    <select id="monthlysession" name="session" readonly class="form-control">
                        <option value="">Select</option>

                        <option value="2021-2022">2021-2022</option>
                        <option value="2020-2021">2020-2021</option>
                        <option value="2019-2020">2019-2020</option>
                        <option value="2018-2019">2018-2019</option>
                        <option value="2017-2018">2017-2018</option>

                    </select>
                </div>

            </div>

        </div>

    </div><br><br>
</body>

</html>