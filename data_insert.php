<?php
require __DIR__.'/__connect__db.php';
$title = '新增資料';
$page_name = 'data_insert';

if(isset($_POST['account'])){
    $sql = "INSERT INTO `account_info` (`account`, `name`, `gender`, `birthday`, `mailbox`, `remarks`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('ssssss',
        $_POST['account'],
        $_POST['name'],
        $_POST['gender'],
        $_POST['birthday'],
        $_POST['mailbox'],
        $_POST['remarks']
    );
    $stmt->execute();

    $affected_rows = $stmt->affected_rows;
    if ($affected_rows == 1) {
        header('refresh:3; url=data_list.php');
    }
}


?>
<?php include __DIR__.'/__html_head.php'; ?>
    <style>
        .form-group>small{
            color:red!important;
            display: none;
        }
    </style>

<div class="container">
    <?php include __DIR__.'/__navbar.php'; ?>
    <?php if (isset($affected_rows)): ?>
        <?php if ($affected_rows == 1): ?>
        <div class="alert alert-success" role="alert" style="margin-top: 30px">
            資料新增成功!
        </div>
            <?php else: ?>
        <div class="alert alert-danger" role="alert">
            資料新增失敗!
        </div>
            <?php endif; ?>
        <?php endif; ?>

    <div class="row justify-content-md-center">
    <div class="col-md-8" style="margin-top:30px">
        <div class="card">
            <div class="card-header">
                新增資料 <?= isset($affected_rows) ? $affected_rows : '' ?>
            </div>
            <div class="card-body">
<!--                `name`, `mobile`, `email`, `birthday`, `address`-->
                <form name="form1" method="post" onsubmit="return checkForm()">
                <div class="form-group">
                        <label for="account">Account</label>
                        <input type="text" class="form-control" id="account" name="account" placeholder="Enter account">
                        <small id="accountHelp" class="form-text text-muted">請填入帳號</small>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        <small id="nameHelp" class="form-text text-muted">請填入姓名</small>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter gender">
                        <small id="genderHelp" class="form-text text-muted">請填入性別</small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Enter birthday">
                        <small id="birthdayHelp" class="form-text text-muted">請填入</small>
                    </div>
                    <div class="form-group">
                        <label for="mailbox">Email</label>
                        <input type="email" class="form-control" id="mailbox" name="mailbox" placeholder="Enter email">
                        <small id="mailboxHelp" class="form-text text-muted">請填入信箱</small>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" id="remarks" name="remarks" cols="50" rows="3" placeholder="Enter remarks"></textarea>
                        <small id="remarksHelp" class="form-text text-muted">請填入</small>
                    </div>

                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

    <script>

        var fields_names = ['account', 'name', 'gender', 'birthday', 'mailbox', 'remarks'];
        var fields = {};
        var i, s, key;
        var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var mobile_pattern = /[0-9\-]{10,}/;
        for (i = 0; i < fields_names.length; i++) {
            key = fields_names[i];
            fields[key] = {
                input: $('#' + key),
                help: $('#' + key + 'help')
            };

        }
        console.log(fields);

        function checkForm(){
            var isPass = true;
            for (s in fields) {
                fields[s].help.hide();
                fields[s].input.css('border-color', 'gray');
            }


            if (fields['name'].input.val().length < 2) {
                fields['name'].help.show();
                fields['name'].input.css('border-color', 'red');
                isPass = false;
            }
//          直觀的JQUERY作法
//            if (name.length < 2) {
//                $('#nameHelp').show();
//                $('#name').css('border-color', 'red');
//                return false;
//            }
            // if (! mobile_pattern.test(fields['mobile'].input.val())) {
//                alert('請填入姓名');
            //     fields['mobile'].help.show();
            //     fields['mobile'].input.css('border-color', 'red');
            //     isPass = false;
            // }
            if (! pattern.test(fields['mailbox'].input.val())) {
//                alert('請填入姓名');
                fields['mailbox'].help.show();
                fields['mailbox'].input.css('border-color', 'red');
                isPass = false;
            }
            return isPass;
        }
    </script>
<?php include __DIR__.'/__html_foot.php'; ?>