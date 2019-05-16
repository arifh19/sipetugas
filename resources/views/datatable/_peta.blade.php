<?php
    $geolokasi = $model->lokasi;
    $splitkoordinat = (explode(",",$geolokasi));
    $longitude = $splitkoordinat[0];
    $latitude = $splitkoordinat[1];
?>
<html>
        <style>
            .google-maps {
                position: relative;
                padding-bottom: 75%; // This is the aspect ratio
                height: 0;
                overflow: hidden;
            }
            .google-maps iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100% !important;
                height: 100% !important;
            }
        </style>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        Peta
      </button>
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog" style="width: 50%">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Posisi Bus</h4>
            </div>
            <div class="modal-body">
                <div class="google-maps"><iframe src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q={{$longitude}}%2C%20{{$latitude}}+(Title)&amp;ie=UTF8&amp;t=&amp;z=18&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><br />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</html>
