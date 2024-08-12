// JavaScript Document
function lof(x)
{
	location.href=x
}

function del(table,id){
	$.post("./api/del.php",{table,id},function(){
		location.reload()
	}	)
}


function editType(id, dom) {
	let name = $(dom).parent().prev().text();
	let result = prompt("請輸入要修改的分類名稱", name);
	if (result != null) {
		$.post('api/edit_type.php', {
			id,
			name: result
		}, () => {
			//location.reload();
			$(dom).parent().prev().text(result);
		})
	}

}

function getTypes(type = 'big', id = 0,selected=0) {
	$.get("./api/get_types.php", {
		type,
		id,
	}, (types) => {

		switch (type) {
			case 'big':
				$("#bigSelect").html(types)
				if(selected>0){
					$("#bigSelect").val(selected)
					getTypes('mid',selected)
				}
				break;
			case 'mid':
				$("#midSelect").html(types)
				if(selected>0){
					$("#midSelect").val(selected)
				}
				break;
		}
	})
}

function addType(type) {
	let big, mid;
	switch (type) {
		case 'big':
			big = $("#big").val();
			$.post('api/add_type.php', {
				type,
				big
			}, () => {
				location.reload();
				//getTypes('big', 0);
				//$("#big").val('');
			})
			break;
		case 'mid':
			big = $("#bigSelect").val();
			mid = $("#mid").val();
			$.post('api/add_type.php', {
				type,
				big,
				mid
			}, () => {
				location.reload();
			})
			break;
	}
}