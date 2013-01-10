<? 
	require("header.php");
	require("sideBar.php");
?>

<div class="body">
    <div class="bar One">
    	<div class="barHeader">Add New Project<span class="minState" id="minState_3">-</span></div>
        <div class="barContents" id="bC1">
			<form>
            	<label>Project URL:<input type="text" style="width: 97%;" name="Project_URL" /></label>
                <label style="position: relative; float: left; width: 31%; margin-right: 2%;">Freelancer Commission:<input type="text" style="width: 90%;" name="FL_Fee" /></label>
                <label style="position: relative; float: left; width: 31%; margin-right: 2%;">Start Date:<input type="text" style="width: 96%;" class="dateInput" name="Start_Date" /></label>
                <label style="position: relative; float: left; width: 32%; margin-left: 1%;">Project Value:<input type="text" style="width: 94%;"name="Project_Value" /></label>
                <label style="position: relative; float: left; width: 31%; margin-right: 2%;">Project Division:<input type="text" style="width: 94%;" name="Project_Div" /></label>
                <label style="position: relative; float: left; width: 31%; margin-right: 2%;">Project Milestones:<input type="text" style="width: 94%;" name="Project_Milestones" /></label>
                <label style="position: relative; float: left; width: 32%; margin-left: 1%;">Project Tasks:<input type="text" style="width: 94%;"name="Project_Value" /></label>
                <label>Project Notes:<textarea style="width:97%;" name="Project_Notes"></textarea></label>
                <div class="progress" id="progress1">
                    <div class="prog_header">
                        <div class="label">Milestones:</div>
                        <div class="controls"><span class="incButton" id="inc_m">+</span><span class="dcrButton" id="dcr_m">-</span></div>
                    </div>
                    <div class="progBar">
                        <div class="pb_container" id="pc_1">
                            <div class="pb_fill" id="pf_1"></div>
                            <div class="pb_fill" id="pf_2"></div>
                            <div class="pb_fill" id="pf_3"></div>
                            <div class="pb_fill" id="pf_4"></div>
                        </div>
                        <div class="pt_shad">
                            <div class="progTab" id="pt_1"></div>
                            <div class="progTab" id="pt_2"></div>
                            <div class="progTab" id="pt_3"></div>
                            <div class="progTab" id="pt_4"></div>
                        </div>
                    </div>
                </div>
                <div class="progress" id="progress2">
                    <div class="prog_header">
                        <div class="label">Project Division:</div>
                        <div class="controls"><span class="incButton" id="inc_m">+</span><span class="dcrButton" id="dcr_m">-</span></div>
                    </div>
                    <div class="progBar">
                        <div class="pb_container" id="pc_1">
                            <div class="pb_fill" id="pf_1"></div>
                            <div class="pb_fill" id="pf_2"></div>
                            <div class="pb_fill" id="pf_3"></div>
                            <div class="pb_fill" id="pf_4"></div>
                        </div>
                        <div class="pt_shad">
                            <div class="progTab" id="pt_1"></div>
                            <div class="progTab" id="pt_2"></div>
                            <div class="progTab" id="pt_3"></div>
                            <div class="progTab" id="pt_4"></div>
                        </div>
                    </div>
                </div>
                <input type="submit" style="margin-top: 20px; width: 150px; height: 30px; cursor: pointer;"/>
            </form>
        </div>
    </div>
</div>
</body>
</html>