$(document).ready(function(){
	$('#example').Tabledit({
		url: '../controller/live_edit.php',
		deleteButton: false,
		editButton: false,   
		hideIdentifier: true,			
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, '1'],[3,'3'],[4,'4'],[5,'5'],[6,'6'],[7,'7'],[8,'8'],[9,'9'],[11,'11'],[12,'12'],[15,'15'],[16,'16'],[17,'17'],[18,'18'],[19,'19']]
		},
	});
});