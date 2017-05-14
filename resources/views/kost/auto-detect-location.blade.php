<script>
  if (navigator && navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(location) {
        if ( !$(".gllpLatlonPicker .gllpLatitude").val() || !$(".gllpLatlonPicker .gllpLongitude").val() ) {
            $(".gllpLatlonPicker .gllpLatitude").val(location.coords.latitude);
            $(".gllpLatlonPicker .gllpLongitude").val(location.coords.longitude);
            $(document).trigger("gllp_update_fields");
        }
    }, function() {});
  }
</script>