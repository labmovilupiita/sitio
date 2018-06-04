
function actualizarEstadisticas(array){

	var echartBar = echarts.init(document.getElementById('mainb'), theme);

	echartBar.setOption({
		title: {
		  text: 'Comparativa de Impacto',
		  subtext: 'por fecha'
		},
		tooltip: {
		  trigger: 'axis'
		},
		legend: {
		  data: ['Sin Violencia', 'Violencia','No Especificados']
		},
		toolbox: {
		  show: false
		},
		calculable: false,
		xAxis: [{
		  type: 'category',
		  data: array['ejex']//['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
		}],
		yAxis: [{
		  type: 'value'
		}],
		series: [{
		  name: 'Sin Violencia',
		  type: 'bar',
		  data: array['sinViolencia'],//[600,522,856,632,210,301,895,647,756,123,545,555],
		  markPoint: {
			data: [{
			  type: 'max',
			  name: 'max'
			}, {
			  type: 'min',
			  name: 'min'
			}]
		  },
		  markLine: {
			data: [{
			  type: 'average',
			  name: 'promedio'
			}]
		  }
		}, {
		  name: 'Violencia',
		  type: 'bar',
		  data: array['violencia'],//[235,855,211,752,663,320,411,200,100,187,321,475],
		  markPoint: {
			data: [{
			  type: 'max',
			  name: 'max'
			}, {
			  type: 'min',
			  name: 'min'
			}]
		  },
		  markLine: {
			data: [{
			  type: 'average',
			  name: 'promedio'
			}]
		  }
		}, {
		  name: 'No Especificados',
		  type: 'bar',
		  data: array['noEspecificados'],//[235,855,211,752,663,320,411,200,100,187,321,475],
		  markPoint: {
			data: [{
			  type: 'max',
			  name: 'max'
			}, {
			  type: 'min',
			  name: 'min'
			}]
		  },
		  markLine: {
			data: [{
			  type: 'average',
			  name: 'promedio'
			}]
		  }
		}]
	});

}