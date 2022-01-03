   <div class="row col-12">
    <canvas id="myChart" style="width:100%;"></canvas>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<?php $colors=[];
for($i=0;$i<count($genders);$i++){
    $colors[$i]=$i%2?'red':'green';
}
$genders_names=array_column($genders,'gender');
$counts=array_column($genders,'count');

?>

<script>
var xValues = <?=json_encode($genders_names)?>;

var yValues = <?=json_encode($counts)?>;
var barColors = <?=json_encode($colors)?>;

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Male vs Females"
    }
  }
});
</script>
@endpush