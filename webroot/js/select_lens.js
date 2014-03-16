$(function(){
for (var i=-4.00;i<=4.00;i+=0.25){
	$('<option />').append(i.toFixed(2)).appendTo('#LensAstigR,#LensAstigL,#LensInfoAstigR,#LensInfoAstigL');
}
for(var i=-16.00;i<=10.00;i+=0.25){
	$('<option />').append(i.toFixed(2)).appendTo('#LensLevelR,#LensLevelL,#LensInfoLevelR,#LensInfoLevelL');
}

$('#LensLevelR,#LensLevelL,#LensInfoLevelR,#LensInfoLevelL').val('0.00');
$('#LensAstigR,#LensAstigL,#LensInfoAstigR,#LensInfoAstigL').val('0.00');


//
$('#no_lens,#leveled_lens,.submit').hide();

$('#LensIsLeveled').change(function(){
	if($('#LensIsLeveled').val()=='1'){
		$('#leveled_lens').fadeOut( function(){ $('#no_lens,.submit').fadeIn()});
	};
	if($('#LensIsLeveled').val()=='2'){
		$('#no_lens').fadeOut(function(){ $('#leveled_lens,.submit').fadeIn(); });
		/*$('#leveled_lens,.submit').fadeIn();*/
	};

	$('#LensIsLeveled option[value=3]').remove();
});
$('.submit').click(function(e){
	e.preventDefault();
	var message='';
	if($('#LensIsLeveled').val()=='2'){
			if(!$('input[name="data[Lens][enkin_lens_id]"]:checked').val()){
				message+='近視用、遠視用を選択してください<br />';
			}
			if(!$('input[name="data[Lens][leveled_lens_id]"]:checked').val()){
				message+='レンズの種類を選択してください<br />';
			}
			if(!$('input[name="data[Lens][send_lens_id]"]:checked').val()){
				message+='レンズデータの取得方法を選択してください';
			}
	}else if($('#LensIsLeveled').val()=='1'){
		if(!$('input[name="data[Lens][no_lens_id]"]:checked').val()){
			message='レンズの種類を選択してください';
		}
	}
	if(message){
		$('#message').html(message);
	}else{
		$('form').submit();
	}
});

});
