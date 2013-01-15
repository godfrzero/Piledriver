<div class="body">
    <div class="bar Two">
    	<div class="barHeader">Add Member<span class="minState" id="minState_3">-</span></div>
        <div class="barContents" id="bC3">
            <?= form_open('/admin/manageMember')?>
            <div class="formBlock centered">
                <input type="text" name="uName" id="uName" placeholder="Username" />
            </div>
            <div class="formBlock centered">
                <input type="password" name="pWord" id="pWord" placeholder="Password" />
            </div>
            <div class="formBlock centered">
                <select name="acType" id="acType">
                    <option value="Admin" >Admin</option>
                    <option value="Member" >Member</option>
                    <option value="Client" >Client</option>
                </select>
            </div>
            <div class="formBlock centered">
                <input type="Submit" value="Add Member"/>
            </div>
            <?= form_close() ?>
        </div>
    </div>

    <div class="bar Two">
        <div class="barHeader">Latest Logins<span class="minState">-</span></div>
        <div class="barContents">
        <table>
            <?php foreach($loginHistory as $thisUser) { ?>
            <tr>
                <td><?= $thisUser['UID'] ?></td>
                <td><?= $thisUser['Timestamp'] ?></td>
            </tr>
            <?php } ?>
        </table>
        </div>
    </div>

    <div class="bar One">
        <div class="barHeader">Edit Members<span class="minState" id="minState_5">-</span></div>
        <div class="barContents" id="bC5">
        <?= form_open() ?>
        <?php foreach($userList as $index => $thisUser) { ?>
            <button><input type="checkbox" name="removeUsers[]" value="<?= $thisUser ?>" /><br /><?= $thisUser ?> </button>
        <?php } ?>
        <div class="centered" style="margin-top: 20px;">
            <input type="submit" value="Delete Selected Users" /> or click a user to view details
        </div>
        <?= form_close() ?>
        </div>
    </div>
</div>
</body>
</html>