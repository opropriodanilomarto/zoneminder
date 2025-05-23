//
// Import constants
//

const ZM_DIR_SOUNDS = '<?php echo ZM_DIR_SOUNDS ?>';

<?php
  global $presets;
  global $zone;
  global $newZone;
  global $monitor;
  global $selfIntersecting;
  global $streamMode;
  global $connkey;
?>

var presets = new Object();
<?php
foreach ( $presets as $preset ) {
?>
presets[<?php echo $preset['Id'] ?>] = {
    'UnitsIndex': <?php echo $preset['UnitsIndex'] ?>,
    'CheckMethodIndex': <?php echo $preset['CheckMethodIndex'] ?>,
    'MinPixelThreshold': '<?php echo $preset['MinPixelThreshold'] ?>',
    'MaxPixelThreshold': '<?php echo $preset['MaxPixelThreshold'] ?>',
    'FilterX': '<?php echo $preset['FilterX'] ?>',
    'FilterY': '<?php echo $preset['FilterY'] ?>',
    'MinAlarmPixels': '<?php echo $preset['MinAlarmPixels'] ?>',
    'MaxAlarmPixels': '<?php echo $preset['MaxAlarmPixels'] ?>',
    'MinFilterPixels': '<?php echo $preset['MinFilterPixels'] ?>',
    'MaxFilterPixels': '<?php echo $preset['MaxFilterPixels'] ?>',
    'MinBlobPixels': '<?php echo $preset['MinBlobPixels'] ?>',
    'MaxBlobPixels': '<?php echo $preset['MaxBlobPixels'] ?>',
    'MinBlobs': '<?php echo $preset['MinBlobs'] ?>',
    'MaxBlobs': '<?php echo $preset['MaxBlobs'] ?>',
    'OverloadFrames': '<?php echo $preset['OverloadFrames'] ?>',
    'ExtendAlarmFrames': '<?php echo $preset['ExtendAlarmFrames'] ?>'
};
<?php
} # end foreach preset
?>

var zone = {
    'Name': '<?php echo validJsStr($zone['Name']) ?>',
    'Id': <?php echo validJsStr($zone['Id']) ?>,
    'MonitorId': <?php echo validJsStr($zone['MonitorId']) ?>,
    'CheckMethod': '<?php echo $zone['CheckMethod'] ?>',
    'AlarmRGB': '<?php echo $zone['AlarmRGB'] ?>',
    'NumCoords': <?php echo $zone['NumCoords'] ?>,
    'Coords': '<?php echo $zone['Coords'] ?>',
    'Area': <?php echo $zone['Area'] ?>
};

zone['Points'] = new Array();
<?php
for ( $i = 0; $i < count($newZone['Points']); $i++ ) {
?>
zone['Points'][<?php echo $i ?>] = { 'x': <?php echo $newZone['Points'][$i]['x'] ?>, 'y': <?php echo $newZone['Points'][$i]['y'] ?> };
<?php
}
?>

var maxX = <?php echo $monitor->ViewWidth()-1 ?>;
var maxY = <?php echo $monitor->ViewHeight()-1 ?>;
var monitorArea = <?php echo $monitor->ViewWidth() * $monitor->ViewHeight() ?>;

var monitorData = new Array();
monitorData[monitorData.length] = {
  'id': <?php echo $monitor->Id() ?>,
  'name': '<?php echo $monitor->Name() ?>',
  'connKey': <?php echo $monitor->connKey() ?>,
  'width': <?php echo $monitor->ViewWidth() ?>,
  'height':<?php echo $monitor->ViewHeight() ?>,
  'janusEnabled':<?php echo $monitor->JanusEnabled() ?>,
  'RTSP2WebEnabled': <?php echo $monitor->RTSP2WebEnabled() ?>,
  'RTSP2WebType': '<?php echo $monitor->RTSP2WebType() ?>',
  'RTSP2WebStream': '<?php echo $monitor->RTSP2WebStream() ?>',
  'url': '<?php echo $monitor->UrlToIndex( ZM_MIN_STREAMING_PORT ? ($monitor->Id() + ZM_MIN_STREAMING_PORT) : '') ?>',
  'url_to_zms': '<?php echo $monitor->UrlToZMS( ZM_MIN_STREAMING_PORT ? ($monitor->Id() + ZM_MIN_STREAMING_PORT) : '') ?>',
  'type': '<?php echo $monitor->Type() ?>',
  'capturing': '<?php echo $monitor->Capturing() ?>',
  'refresh': '<?php echo $monitor->Refresh() ?>',
  'janus_pin': '<?php echo $monitor->Janus_Pin() ?>'
};

var selfIntersecting = <?php echo $selfIntersecting ? 'true' : 'false' ?>;

var selfIntersectingString = '<?php echo addslashes(translate('SelfIntersecting')) ?>';
var alarmRGBUnsetString = '<?php echo addslashes(translate('AlarmRGBUnset')) ?>';
var minPixelThresUnsetString = '<?php echo addslashes(translate('MinPixelThresUnset')) ?>';
var minPixelThresLtMaxString = '<?php echo addslashes(translate('MinPixelThresLtMax')) ?>';
var filterUnsetString = '<?php echo addslashes(translate('FilterUnset')) ?>';
var minAlarmAreaUnsetString = '<?php echo addslashes(translate('MinAlarmAreaUnset')) ?>';
var minAlarmAreaLtMaxString = '<?php echo addslashes(translate('MinAlarmAreaLtMax')) ?>';
var minFilterAreaUnsetString = '<?php echo addslashes(translate('MinFilterAreaUnset')) ?>';
var minFilterAreaLtMaxString = '<?php echo addslashes(translate('MinFilterAreaLtMax')) ?>';
var minFilterLtMinAlarmString = '<?php echo addslashes(translate('MinFilterLtMinAlarm')) ?>';
var minBlobAreaUnsetString = '<?php echo addslashes(translate('MinBlobAreaUnset')) ?>';
var minBlobAreaLtMaxString = '<?php echo addslashes(translate('MinBlobAreaLtMax')) ?>';
var minBlobLtMinFilterString = '<?php echo addslashes(translate('MinBlobLtMinFilter')) ?>';
var minBlobsUnsetString = '<?php echo addslashes(translate('MinBlobsUnset')) ?>';
var minBlobsLtMaxString = '<?php echo addslashes(translate('MinBlobsLtMax')) ?>';

var deleteString = "<?php echo translate('Delete') ?>";
//
// Imported from watch.js.php and modified for new zone edit view
//


const POPUP_ON_ALARM = false;

var streamMode = "<?php echo $streamMode ?>";

var connKey = '<?php echo $connkey ?>';

var monitorId = <?php echo $monitor->Id() ?>;
var monitorUrl = '<?php echo ( $monitor->UrlToIndex() ) ?>';

var statusRefreshTimeout = <?php echo 1000*ZM_WEB_REFRESH_STATUS ?>;
var imageRefreshTimeout = <?php echo 1000*ZM_WEB_REFRESH_IMAGE ?>;

var canStream = <?php echo canStream()?'true':'false' ?>;

var translate = {
  "Showing Analysis": '<?php echo translate('Showing Analysis'); ?>',
  "Not Showing Analysis": '<?php echo translate('Not Showing Analysis'); ?>'
};
