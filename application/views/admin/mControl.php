<div class="body">
    <div class="bar Two">
    	<div class="barHeader">Add Member<span class="minState" id="minState_3">-</span></div>
        <div class="barContents" id="bC3">
            <div class="formBlock">
                <label form="uName">
                <input type="text" name="uName" id="uName" placeholder="Username" />
            </div>
            <div class="formBlock">
                <label form="pWord">
                <input type="password" name="pWord" id="pWord" placeholder="Password" />
            </div>
            <div class="formBlock">
                <label form="acType">
                <select name="acType" id="acType">
                    <option value="Admin" >Admin</option>
                    <option value="Member" >Member</option>
                    <option value="Client" >Client</option>
                </select>
            </div>
            <div class="formBlock centered">
                <input type="Submit" value="Add Member"/>
            </div>
        </div>
    </div>

    <div class="bar Two">
        <div class="barHeader">Edit Members<span class="minState" id="minState_5">-</span></div>
        <div class="barContents" id="bC5">
        <table>
            <thead>
                <th style="width: 50px; text-align: center">Delete?</th><th>Name</th>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="block"/></td><td>Vivek Thuravupala</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="block"/></td><td>Jesly Varghese</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="block"/></td><td>Albin George</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="Submit" value="Submit"/>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>