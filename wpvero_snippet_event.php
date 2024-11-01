<script type="text/javascript">
  _veroq.push(['track', '<?php echo $event; ?>' <?php if (!empty($event_data)) { echo ", " . json_encode($event_data); } else { echo ', {}'; } ?>]);
</script>