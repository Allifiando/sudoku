<?PHP
	define("PATHAPP", "/idn"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Big Business 2.0
Description: A two-column, fixed-width design with a bright color scheme.
Version    : 1.0
Released   : 20120624
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Sudoku Test</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="media/css/cssphplama.css" />
<script type="text/javascript" src="media/js/jquery.min.js"></script>
<script type="text/javascript" src="media/js/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="media/js/jquery.slidertron-1.1.js"></script>

<link rel="stylesheet" type="text/css" href= <?PHP echo PATHAPP . "/media/css/cssphpbaru.css"?> />
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/jquery.min.js"?> ></script>
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/jquery.dropotron-1.0.js"?> ></script>
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/jquery.slidertron-1.1.js"?> ></script>

<link rel="stylesheet" href= <?PHP echo PATHAPP . "/media/css/ext-all.css"?> />
<link rel="stylesheet" href= <?PHP echo PATHAPP . "/media/css/icons.css"?> />
<link rel="stylesheet" href= <?PHP echo PATHAPP . "/media/css/app.css"?> />	
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/ext-all.js"?> ></script>
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/exporter/Exporter-all.js"?> ></script>
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/exporter/Base64.js"?> ></script>
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/locale/ext-lang-id.js"?> ></script>
<script type="text/javascript" src= <?PHP echo PATHAPP . "/media/js/app.js"?> ></script>

<script type="text/javascript">
Ext.Loader.setConfig({enabled: true});

Ext.Loader.setPath('<?PHP echo PATHAPP ?>/media/js/ux/');

Ext.require([
    'Ext.grid.*',
    'Ext.panel.*',
	'Ext.data.*',
	'Ext.util.*',
    'Ext.tip.QuickTipManager',
	'Ext.form.field.Number',
	'Ext.selection.CheckboxModel',
	'Ext.toolbar.Paging',
    'Ext.ModelManager',
	'Ext.form.*',
    'Ext.layout.container.Column',
    'Ext.state.*',
]);

Ext.onReady(function () {
		Ext.tip.QuickTipManager.init();
		Ext.Loader.injectScriptElement(
			'<?PHP echo PATHAPP ?>/media/js/locale/ext-lang-id.js',
			setupApp,
			Ext.emptyFn,
			this,
			'utf-8'
		);
});

function setupApp(){
	Ext.QuickTips.init();	
	var currentTime = new Date();
	var rowGrid = 1;	
	var cellEditing = Ext.create('Ext.grid.plugin.CellEditing',{
		clicksToEdit: 1
	});
	var store_sudoku = new Ext.data.JsonStore({
		id:'store_cari_id',
		pageSize: 100,
		model: 'Tes',
		fields:[{
			name: 'HD_ID'
		},{
			name: 'DATA_NOMOR1'
		},{
			name: 'DATA_NOMOR2'
		},{
			name: 'DATA_NOMOR3'
		},{
			name: 'DATA_NOMOR4'
		},{
			name: 'DATA_NOMOR5'
		},{
			name: 'DATA_NOMOR6'
		},{
			name: 'DATA_NOMOR7'
		},{
			name: 'DATA_NOMOR8'
		},{
			name: 'DATA_NOMOR9'
		}]		
	});
	var grid_sudoku = Ext.create('Ext.grid.Panel',{
		store: store_sudoku,
		autoScroll: true,
		columnLines: true,
		width: 485,
		height: 370,
		align:'center',
		title: 'Grid Sudoku',
		frame: false,
		columns: [{
			xtype:'rownumberer',
			id:'row_id',
			header:'Kolom',
			width:50
		},{
			dataIndex:'HD_ID',
			header:'id',
			hidden: true,
			width:50,
		},{
            header: 'Baris 1',
            dataIndex: 'DATA_NOMOR1',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor1',
				name:'tf_nomor1',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 2',
            dataIndex: 'DATA_NOMOR2',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor2',
				name:'tf_nomor2',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 3',
            dataIndex: 'DATA_NOMOR3',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor3',
				name:'tf_nomor3',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 4',
            dataIndex: 'DATA_NOMOR4',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor4',
				name:'tf_nomor4',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 5',
            dataIndex: 'DATA_NOMOR5',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor5',
				name:'tf_nomor5',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 6',
            dataIndex: 'DATA_NOMOR6',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor6',
				name:'tf_nomor6',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 7',
            dataIndex: 'DATA_NOMOR7',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor7',
				name:'tf_nomor7',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 8',
            dataIndex: 'DATA_NOMOR8',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor8',
				name:'tf_nomor8',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 		
				maskRe: /[0-9.]/,
            }
        },{
            header: 'Baris 9',
            dataIndex: 'DATA_NOMOR9',           
			width:48,
            field: {
				xtype:'textfield',
				id:'tf_nomor9',
				name:'tf_nomor9',				
				enforceMaxLength: true,
				minLength: '1',
				maxLength: '1', 				
				maskRe: /[0-9.]/,
            }
        }],
		selModel:{
			selType:'cellmodel'
		},
		plugins: [cellEditing],	
		tbar: [{
			text: 'Tambah',
			id:'btn_tambah',
			style: {
				borderColor: 'grey',
				borderStyle:'solid',
			},
			cls:'button-popup',
			handler : function(){
				if (rowGrid <= 9) {				
					store_sudoku.add({'HD_ID': rowGrid});
					rowGrid++;					
				}else{
					Ext.getCmp('btn_tambah').setDisabled(true);
				}
			}
		}],		
	});
	var contentPanel = Ext.create('Ext.panel.Panel',{
			bodyStyle: 'spacing: 10px;border:none',
			items:[{
				xtype:'label',
				html:'<div align="left"><font size="5"><b>Sudoku Ando</b></font></div>',
			},{		
				xtype:'textfield',
				fieldLabel:'typeform',
				width:350,
				labelWidth:75,
				id:'tf_typeform',
				value:'tambah',
				hidden:true
			},{
				xtype:'label',
				html:'&nbsp',
			},grid_sudoku,{
				xtype:'label',
				html:'<br>',
			},{
				xtype:'button',
				text:'Solve',
				width:100,
				handler:function(){										
					var i=0;
					// var y =0;
					var isisudoku = store_sudoku.count();
					store_sudoku.each(
						function(record){
							if (record.get('DATA_NOMOR1')=='' || record.get('DATA_NOMOR2')=='' || record.get('DATA_NOMOR3')=='' ||
								record.get('DATA_NOMOR4')=='' || record.get('DATA_NOMOR5')=='' || record.get('DATA_NOMOR6')=='' ||
								record.get('DATA_NOMOR7')=='' || record.get('DATA_NOMOR8')=='' || record.get('DATA_NOMOR9')=='' ) {
								i++;
							}
						}
					);
					if (i == 0) {
						if (isisudoku > 0) {
							var arrNomor1 = new Array();
							var arrNomor2 = new Array();
							var arrNomor3 = new Array();
							var arrNomor4 = new Array();
							var arrNomor5 = new Array();
							var arrNomor6 = new Array();
							var arrNomor7 = new Array();
							var arrNomor8 = new Array();
							var arrNomor9 = new Array();
							store_sudoku.each(
								function(record) {		
								arrNomor1[i]=record.get('DATA_NOMOR1');								
								arrNomor2[i]=record.get('DATA_NOMOR2');								
								arrNomor3[i]=record.get('DATA_NOMOR3');								
								arrNomor4[i]=record.get('DATA_NOMOR4');								
								arrNomor5[i]=record.get('DATA_NOMOR5');								
								arrNomor6[i]=record.get('DATA_NOMOR6');								
								arrNomor7[i]=record.get('DATA_NOMOR7');								
								arrNomor8[i]=record.get('DATA_NOMOR8');								
								arrNomor9[i]=record.get('DATA_NOMOR9');								
								i=i+1;
							});
							Ext.Ajax.request({
								url:'<?php echo 'solve.php'; ?>',
								params:{
									typeform:Ext.getCmp('tf_typeform').getValue(),
									arrNomor1:Ext.encode(arrNomor1),
									arrNomor2:Ext.encode(arrNomor2),
									arrNomor3:Ext.encode(arrNomor3),
									arrNomor4:Ext.encode(arrNomor4),
									arrNomor5:Ext.encode(arrNomor5),
									arrNomor6:Ext.encode(arrNomor6),
									arrNomor7:Ext.encode(arrNomor7),
									arrNomor8:Ext.encode(arrNomor8),
									arrNomor9:Ext.encode(arrNomor9),
								},
								method:'POST',
								success:function (response) {
									var json=Ext.decode(response.responseText);
									var msg = json.results;
									if (msg=="Mantap") {
										// store_sudoku.removeAll();
										alertDialog('Kesalahan', "Eror" + json.rows);
									}else{
										alertDialog('Kesalahan', "Eror" + json.results);
									}
								},
								failure:function(error){
									alertDialog('Kesalahan','Eror');
								}
							});
						}
					}
					
				}
			}],
		});
   contentPanel.render('page');
}
</script>


<style type="text/css">
</style>
</head>
<body>
<div id="wrapper">	
		
	<div id="page">
	
	</div>
</div>
<div id="footerlama">
	<?PHP include 'main/footer.php'; ?>
</div>
</body>
</html>