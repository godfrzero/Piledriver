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
        <!-- <table>
            <tr>
            <?php foreach($userList as $index => $thisUser) { ?>
            <?php if( ($index + 1) % 2 ) { echo '</tr><tr>'; } ?>
            <td style="text-align: left;">
                <label><input type="checkbox" value="<?= $thisUser ?>" /> <?= $thisUser ?></label>
            </td>
                <?php if($index == (sizeof($userList) - 1)) { 
                    if(($index + 1) % 2) { ?>
                    <td style="text-align: left;"></td></tr>
                <?php } else { ?>
                    </tr>
                <?php }
                } 
            } ?>
            <tr>
                <td colspan="2" class="centered">
                    <input type="submit" value="Delete Selected Members" /> or click a member name to view details
                </td>
            </tr>
        </table> -->
        <?= form_close() ?>
        </div>
    </div>
</div>
</body>
</html>