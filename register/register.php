<?php require_once 'include/header.php'; ?>
<div class="content">

    <!-- Nav pills -->
    <div style="display: flex;justify-content: center;align-items: center;margin-top:20px;">
        <img class="logo" src="../images/cs_logo.png" width="400px" alt="AVATAR">
    </div>
    <div class="form">
        <h2 class="title" style="text-align:center;color:white;">
            <!-- <img src="https://image.flaticon.com/icons/svg/1597/1597110.svg" width="10%"> -->
            สมัครสมาชิก
            <!-- <img src="https://image.flaticon.com/icons/svg/1651/1651586.svg" width="10%"></i> -->
        </h2>
        <!-- <label style="display: flex;justify-content: center;align-items: center; color:#ffffff;">
                    ------------------------ </label> -->
    </div>
    <br>
    <ul class="nav nav-pills" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#regisTeach">สำหรับบุคลากร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#regisStd">สำหรับนักศึกษา</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="regisTeach" class="container tab-pane active">
            <form method="POST" action="add_register.php">

                <div class="form-group">
                    <label for="email">อีเมล *</label>&nbsp;<span class="badge badge-info" style="font-weight:normal;">(ใช้ @kku.ac.th เท่านั้น)</span>
                    <div class="input-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                        <div class="input-group-append">
                            <span class="input-group-text">@kku.ac.th</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">รหัสผ่าน *</label>&nbsp;<span class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10 ตัวเท่านั้น)</span>
                    <input type="password" class="form-control" id="password" name="password" pattern="[A-Za-z0-9]{6,10}" maxlength="10" placeholder="Password" autocomplete="off" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                </div>

                <div class="form-group">
                    <label for="fullname">ชื่อ - นามสกุล *</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" autocomplete="off" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                </div>

                <div class="form-group">
                    <label for="phone">เบอร์โทรศัพท์ *</label>&nbsp;<span class="badge badge-info" style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" maxlength="10" autocomplete="off" required OnKeyPress="return chkNumber(this)">
                    <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                </div>

                <br>
                <a href="../login.php" class="btn btn-warning" role="button" aria-pressed="true"><img src="https://image.flaticon.com/icons/svg/709/709606.svg" width="15px">&nbsp;ไปเข้าสู่ระบบ</a>
                <button type="submit" id="btnTeachSubmit" name="btnTeachSubmit" class="btn btn-primary">ลงทะเบียน</button>
            </form>
        </div>

        <div id="regisStd" class="container tab-pane fade">
            <form method="POST" action="add_register.php">

                <div class="form-group">
                    <label for="user_id">รหัสนักศึกษา *</label>&nbsp;<span class="badge badge-info" style="font-weight:normal;">(ตัวอย่าง: 60302xxxx-x *ใส่ขีดด้วย*)</span>
                    <input type="text" class="form-control" id="user_id" name="user_id" placeholder="60302xxxx-x" autocomplete="off" required OnInput="add_hyphen()" maxlength="11" OnKeyPress="return chkNumber(this)" pattern="[0-9]{8,8}.[-].[0-9]{0,0}">
                    <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน *</label>&nbsp;<span class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10 ตัวเท่านั้น)</span>
                    <input type="password" class="form-control" id="password" name="password" pattern="[A-Za-z0-9]{6,10}" maxlength="10" placeholder="Password" autocomplete="off" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                </div>

                <div class="form-group">
                    <label for="fullname">ชื่อ - นามสกุล *</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" autocomplete="off" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">.</small> -->
                </div>

                <div class="form-group">
                    <label for="email">อีเมล *</label>&nbsp;<span class="badge badge-info" style="font-weight:normal;">(ใช้ @kkumail.com เท่านั้น)</span>
                    <div class="input-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                        <div class="input-group-append">
                            <span class="input-group-text">@kkumail.com</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">เบอร์โทรศัพท์ *</label>&nbsp;<span class="badge badge-info" style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off" maxlength="10" required OnKeyPress="return chkNumber(this)">
                    <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">ระดับปริญญา *</label>
                        <select name="degree" id="degree" class="form-control" required>
                            <option value="" disabled="disabled" selected>..กรุณาเลือก..
                            </option>
                            <option value="1">ปริญญาตรี</option>
                            <option value="2">ปริญญาโท</option>
                            <option value="3">ปริญญาเอก</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">หลักสูตร *</label>
                        <select name="department" id="department" class="form-control" required>
                            <option value="" disabled="disabled" selected>..กรุณาเลือก..
                            </option>
                            <option value="1">วิทยาการคอมพิวเตอร์</option>
                            <option value="2">เทคโนยีสารสนเทศ</option>
                            <option value="3">ภูมิศาสตร์สารสนเทศ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">ชั้นปี</label>
                        <input type="text" class="form-control" id="col_year" name="col_year" placeholder="ชั้นปีที่" required autocomplete="off" maxlength="1" OnKeyPress="return chkNumber1(this)">
                    </div>
                </div>
                <br>
                <a href="../login.php" class="btn btn-warning" role="button" aria-pressed="true"><img src="https://image.flaticon.com/icons/svg/709/709606.svg" width="15px">&nbsp;ไปเข้าสู่ระบบ</a>
                <button type="submit" id="btnStdSubmit" name="btnStdSubmit" class="btn btn-primary">ลงทะเบียน</button>
                <button type="button" onclick="swalFunction()">Alert</button>
            </form>
        </div>
    </div>
</div>

<script language="JavaScript">
    function add_hyphen() {
        var input = document.getElementById("user_id");
        var str = input.value;
        str = str.replace("-", "");
        if (str.length > 9) {
            str = str.substring(0, 9) + "-" + str.substring(9);
        }
        input.value = str
    }

    function chkNumber(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }

    function chkNumber1(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '1' || vchar > '4') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }
</script>



<?php require_once 'include/footer.php'; ?>