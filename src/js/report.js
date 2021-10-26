(function($) {
  'use strict';

  var c3DonutChart = c3.generate({
    bindto: '#c3-donut-chart',
    data: {
      columns: [
        ['data1', 30],
        ['data2', 120],
      ],
      type: 'donut',
      onclick: function(d, i) {
        console.log("onclick", d, i);
      },
      onmouseover: function(d, i) {
        console.log("onmouseover", d, i);
      },
      onmouseout: function(d, i) {
        console.log("onmouseout", d, i);
      }
    },
    color: {
      pattern: ['rgba(118, 255, 3)', 'rgba(0, 229, 255)', 'rgba(255, 23, 68)', 'rgba(233, 253, 0, 0.87)','rgba(191, 85, 236)']
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 30,
      left: 0,
    }, 
    donut: {
      title: "Summary of Reports"
    }
  });

  setTimeout(function() {
    c3DonutChart.load({
      columns: [
        ["Course", courseCount],
        ["Curriculum", curriculumCount],
        ["Subjects", studentCount],
        ["Students", studentCount],
        ["Departments", departmentCount],
      ]
    });
  }, 500);

  setTimeout(function() {
    c3DonutChart.unload({
      ids: 'data1'
    });
    c3DonutChart.unload({
      ids: 'data2'
    });
  }, 1500);

})(jQuery);
