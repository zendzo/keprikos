<script>
function readURL(input,imageId,previewId,inputId) {

			if (input.files && input.files[0]) {
			    var reader = new FileReader();

			    reader.onload = function (e) {
			        $(imageId).attr('src', e.target.result);
			    }

			    reader.readAsDataURL(input.files[0]);
			}

			$(previewId).fadeIn(1500);
}

function previewImage(inputName,fieldName,previewName){

	$(inputName).change(function(){

		readURL(this,fieldName,previewName);

	});
}

function previewImageOnLoad(previewId,previewValue){
	$(document).ready(function(){
		$(previewId).attr('src',previewValue).fadeIn(1500);
	});
}

// if input file change show the image in the div.preview
	$('div[id*="preview"]').hide();
	previewImage("#inputCoverPhoto","#coverPhoto","#previewCoverPhoto");
	previewImage("#inputBuildingPhoto","#buildingPhoto","#previewBuildingPhoto");
	previewImage("#inputRoomFrontPhoto","#roomFrontPhoto","#previewRoomFrontPhoto");
	previewImage("#inputRoomInsidePhoto","#roomInsidePhoto","#previewRoomInsidePhoto");
	previewImage("#inputToiletFrontPhoto","#toiletFrontPhoto","#previewToiletFrontPhoto");
	previewImage("#inputToiletInsidePhoto","#toiletInsidePhoto","#previewToiletInsidePhoto");
	previewImage("#inputOtherFacilityPhoto","#otherFacilityPhoto","#previewOtherFacilityPhoto");
</script>