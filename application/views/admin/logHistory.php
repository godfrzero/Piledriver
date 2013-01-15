<div class="body">
    <div class="bar One">
        <div class="barHeader">Login History<span class="minState">-</span></div>
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
</div>
</body>
</html>