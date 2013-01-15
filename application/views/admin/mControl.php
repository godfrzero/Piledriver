<div class="body">
    <div class="bar Two">
    	<div class="barHeader">Add Member<span class="minState">-</span></div>
        <div class="barContents">
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
            <tr>
                <th colspan="2" class="centered">
                    <button type="button" onClick="window.location = '<?= base_url() ?>admin/loginHistory'">View All</button>
                </th>
            </tr>
        </table>
        </div>
    </div>

    <div class="bar One">
        <div class="barHeader">Edit Members<span class="minState">-</span></div>
        <div class="barContents">
        <?= form_open('admin/editMembers') ?>
        <?php foreach($userList as $index => $thisUser) { ?>
            <button type="button" onclick="window.location = '<?= base_url() ?>admin/editMember/<?= $thisUser ?>'">
                <input type="checkbox" name="removeUsers[]" value="<?= $thisUser ?>" />
                <?= $thisUser ?> 
            </button>
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