<?php
$arr = array();
$id = $_GET['id']; 
$q = "SELECT rating FROM contest_user_rating WHERE uid = $id";
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
$i = 0;
while($row = mysqli_fetch_assoc($r)){
	$arr[$i] = (int)$row['rating'];
	$i++;
}
$res = json_encode($arr);
?>

<script>

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        yAxis: {
            title: {
                text: ''
            },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: [{ //Newbie
                from: 0,
                to: 1200,
                color: 'rgba(128,128,128, 0.4)',
                
            }, { // Pupil
                from: 1200,
                to: 1400,
                color: 'rgba(0,128, 0, 0.9)'
            }, { // Gentle breeze
                from: 1400,
                to: 1600,
                color: 'rgba(3,168,158,0.5)',
                
            }, { // Moderate breeze
                from: 1600,
                to: 1900,
                color: 'rgba(0, 0, 255, 0.5)',
                
            }, { // Fresh breeze
                from: 1900,
                to: 2200,
                color: 'rgba(170,0,170,0.5)',
               
            }, { // Strong breeze
                from: 2200,
                to: 2300,
                color: 'rgba(255, 140, 0, 0.5)',
               
            }, { // High wind
                from: 2300,
                to: 2400,
                color: 'rgba(255, 140,0, 0.6)',
                
            },{ // Strong breeze
                from: 2400,
                to: 2600,
                color: 'rgba(255,0, 0, 0.4)',
                
            },{ // Strong breeze
                from: 2600,
                to: 2900,
                color: 'rgba(255, 0, 0, 0.6)',
                
            },{ // Strong breeze
                from: 2900,
                to: 3300,
                color: 'rgba(255, 0, 0,1)',
               
            }]
        },
        tooltip: {
           
        },
        plotOptions: {
					series: {
					 dataLabels: {
						color: '#FFFFFF'
					 },
					 marker: {
						lineColor: '#FFFFFF'
					 }
			  	},
            spline: {
                lineWidth: 3,
                states: {
                    hover: {
                        lineWidth: 4
                    }
                },
				color: '#FFFFFF',
                marker: {
                    enabled: true
                },
                pointInterval: 3600000, // one hour
                pointStart: Date.UTC(2015, 4, 31, 0, 0, 0)
            }
        },
        series: [{
            name: 'Hestavollane',
            data: <?php echo $res; ?>

        }],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
            }
        }
    });
});
</script>