/*
 Highcharts JS v8.2.2 (2020-10-22)

 (c) 2009-2019 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(e){"object"===typeof module&&module.exports?(e["default"]=e,module.exports=e):"function"===typeof define&&define.amd?define("highcharts/modules/draggable-points",["highcharts"],function(r){e(r);e.Highcharts=r;return e}):e("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(e){function r(e,v,u,l){e.hasOwnProperty(v)||(e[v]=l.apply(null,u))}e=e?e._modules:{};r(e,"Extensions/DraggablePoints.js",[e["Core/Chart/Chart.js"],e["Core/Globals.js"],e["Core/Series/Point.js"],e["Core/Utilities.js"]],
function(e,v,u,l){function r(a){return{left:"right",right:"left",top:"bottom",bottom:"top"}[a]}function L(a){var b=["draggableX","draggableY"],c;q(a.dragDropProps,function(a){a.optionName&&b.push(a.optionName)});for(c=b.length;c--;)if(a.options.dragDrop[b[c]])return!0}function M(a){var b=a.series?a.series.length:0;if(a.hasCartesianSeries&&!a.polar)for(;b--;)if(a.series[b].options.dragDrop&&L(a.series[b]))return!0}function N(a){var b=a.series,c=b.options.dragDrop||{};a=a.options&&a.options.dragDrop;
var d,f;q(b.dragDropProps,function(a){"x"===a.axis&&a.move?d=!0:"y"===a.axis&&a.move&&(f=!0)});return(c.draggableX&&d||c.draggableY&&f)&&!(a&&!1===a.draggableX&&!1===a.draggableY)&&b.yAxis&&b.xAxis}function x(a,b){return"undefined"===typeof a.chartX||"undefined"===typeof a.chartY?b.pointer.normalize(a):a}function y(a,b,c,d){var f=b.map(function(b){return n(a,b,c,d)});return function(){f.forEach(function(a){a()})}}function O(a,b,c){var d=b.dragDropData.origin;b=d.chartX;d=d.chartY;var f=a.chartX;a=
a.chartY;return Math.sqrt((f-b)*(f-b)+(a-d)*(a-d))>c}function P(a,b,c){var d={chartX:a.chartX,chartY:a.chartY,guideBox:c&&{x:c.attr("x"),y:c.attr("y"),width:c.attr("width"),height:c.attr("height")},points:{}};b.forEach(function(b){var c={};q(b.series.dragDropProps,function(d,f){d=b.series[d.axis+"Axis"];c[f]=b[f];c[f+"Offset"]=d.toPixels(b[f])-(d.horiz?a.chartX:a.chartY)});c.point=b;d.points[b.id]=c});return d}function Q(a){var b=a.series,c=[],d=b.options.dragDrop.groupBy;b.isSeriesBoosting?b.options.data.forEach(function(a,
d){c.push((new b.pointClass).init(b,a));c[c.length-1].index=d}):c=b.points;return a.options[d]?c.filter(function(b){return b.options[d]===a.options[d]}):[a]}function E(a,b){var c=Q(b),d=b.series,f=d.chart,m;w(d.options.dragDrop&&d.options.dragDrop.liveRedraw,!0)||(f.dragGuideBox=m=d.getGuideBox(c),f.setGuideBoxState("default",d.options.dragDrop.guideBox).add(d.group));f.dragDropData={origin:P(a,c,m),point:b,groupedPoints:c,isDragging:!0}}function R(a,b){var c=a.point,d=p(c.series.options.dragDrop,
c.options.dragDrop),f={},m=a.updateProp,C={};q(c.series.dragDropProps,function(a,b){if(!m||m===b&&a.resize&&(!a.optionName||!1!==d[a.optionName]))if(m||a.move&&("x"===a.axis&&d.draggableX||"y"===a.axis&&d.draggableY))f[b]=a});(m?[c]:a.groupedPoints).forEach(function(c){C[c.id]={point:c,newValues:c.getDropValues(a.origin,b,f)}});return C}function F(a,b){var c=a.dragDropData.newPoints;b=!1===b?!1:p({duration:400},a.options.chart.animation);a.isDragDropAnimating=!0;q(c,function(a){a.point.update(a.newValues,
!1)});a.redraw(b);setTimeout(function(){delete a.isDragDropAnimating;a.hoverPoint&&!a.dragHandles&&a.hoverPoint.showDragHandles()},b.duration)}function G(a){var b=a.series&&a.series.chart,c=b&&b.dragDropData;!b||!b.dragHandles||c&&(c.isDragging&&c.draggedPastSensitivity||c.isHoveringHandle===a.id)||b.hideDragHandles()}function H(a){var b=0,c;for(c in a)Object.hasOwnProperty.call(a,c)&&b++;return b}function I(a){for(var b in a)if(Object.hasOwnProperty.call(a,b))return a[b]}function S(a,b){if(!b.zoomOrPanKeyPressed(a)){var c=
b.dragDropData;var d=0;if(c&&c.isDragging){var f=c.point;d=f.series.options.dragDrop;a.preventDefault();c.draggedPastSensitivity||(c.draggedPastSensitivity=O(a,b,w(f.options.dragDrop&&f.options.dragDrop.dragSensitivity,d&&d.dragSensitivity,2)));c.draggedPastSensitivity&&(c.newPoints=R(c,a),b=c.newPoints,d=H(b),b=1===d?I(b):null,f.firePointEvent("drag",{origin:c.origin,newPoints:c.newPoints,newPoint:b&&b.newValues,newPointId:b&&b.point.id,numNewPoints:d,chartX:a.chartX,chartY:a.chartY},function(){var b=
f.series,c=b.chart,d=c.dragDropData,e=p(b.options.dragDrop,f.options.dragDrop),g=e.draggableX,k=e.draggableY;b=d.origin;var h=a.chartX-b.chartX,z=a.chartY-b.chartY,t=h;d=d.updateProp;c.inverted&&(h=-z,z=-t);if(w(e.liveRedraw,!0))F(c,!1),f.showDragHandles();else if(d){g=h;c=z;t=f.series;k=t.chart;d=k.dragDropData;e=t.dragDropProps[d.updateProp];var l=d.newPoints[f.id].newValues;var q="function"===typeof e.resizeSide?e.resizeSide(l,f):e.resizeSide;e.beforeResize&&e.beforeResize(k.dragGuideBox,l,f);
k=k.dragGuideBox;t="x"===e.axis&&t.xAxis.reversed||"y"===e.axis&&t.yAxis.reversed?r(q):q;g="x"===e.axis?g-(d.origin.prevdX||0):0;c="y"===e.axis?c-(d.origin.prevdY||0):0;switch(t){case "left":var n={x:k.attr("x")+g,width:Math.max(1,k.attr("width")-g)};break;case "right":n={width:Math.max(1,k.attr("width")+g)};break;case "top":n={y:k.attr("y")+c,height:Math.max(1,k.attr("height")-c)};break;case "bottom":n={height:Math.max(1,k.attr("height")+c)}}k.attr(n)}else c.dragGuideBox.translate(g?h:0,k?z:0);b.prevdX=
h;b.prevdY=z}))}}}function B(a,b){var c=b.dragDropData;if(c&&c.isDragging&&c.draggedPastSensitivity){var d=c.point,f=c.newPoints,e=H(f),g=1===e?I(f):null;b.dragHandles&&b.hideDragHandles();a.preventDefault();b.cancelClick=!0;d.firePointEvent("drop",{origin:c.origin,chartX:a.chartX,chartY:a.chartY,newPoints:f,numNewPoints:e,newPoint:g&&g.newValues,newPointId:g&&g.point.id},function(){F(b)})}delete b.dragDropData;b.dragGuideBox&&(b.dragGuideBox.destroy(),delete b.dragGuideBox)}function T(a){var b=a.container,
c=v.doc;M(a)&&(y(b,["mousedown","touchstart"],function(b){b=x(b,a);var c=a.hoverPoint,d=p(c&&c.series.options.dragDrop,c&&c.options.dragDrop),e=d.draggableX||!1;d=d.draggableY||!1;a.cancelClick=!1;!e&&!d||a.zoomOrPanKeyPressed(b)||a.hasDraggedAnnotation||(a.dragDropData&&a.dragDropData.isDragging?B(b,a):c&&N(c)&&(a.mouseIsDown=!1,E(b,c),c.firePointEvent("dragStart",b)))}),y(b,["mousemove","touchmove"],function(b){S(x(b,a),a)}),n(b,"mouseleave",function(b){B(x(b,a),a)}),a.unbindDragDropMouseUp=y(c,
["mouseup","touchend"],function(b){B(x(b,a),a)}),a.hasAddedDragDropEvents=!0,n(a,"destroy",function(){a.unbindDragDropMouseUp&&a.unbindDragDropMouseUp()}))}var n=l.addEvent,U=l.clamp,p=l.merge,q=l.objectEach,w=l.pick;"";var g=v.seriesTypes;l=function(a){a=a.shapeArgs||a.graphic.getBBox();var b=a.r||0,c=a.height/2;return[["M",0,b],["L",0,c-5],["A",1,1,0,0,0,0,c+5],["A",1,1,0,0,0,0,c-5],["M",0,c+5],["L",0,a.height-b]]};var A=g.line.prototype.dragDropProps={x:{axis:"x",move:!0},y:{axis:"y",move:!0}};
g.flags&&(g.flags.prototype.dragDropProps=A);var h=g.column.prototype.dragDropProps={x:{axis:"x",move:!0},y:{axis:"y",move:!1,resize:!0,beforeResize:function(a,b,c){var d=c.series.translatedThreshold,f=a.attr("y");b.y>=c.series.options.threshold?(b=a.attr("height"),a.attr({height:Math.max(0,Math.round(b+(d?d-(f+b):0)))})):a.attr({y:Math.round(f+(d?d-f:0))})},resizeSide:function(a,b){var c=b.series.chart.dragHandles;a=a.y>=(b.series.options.threshold||0)?"top":"bottom";b=r(a);c[b]&&(c[b].destroy(),
delete c[b]);return a},handlePositioner:function(a){var b=a.shapeArgs||a.graphic.getBBox();return{x:b.x,y:a.y>=(a.series.options.threshold||0)?b.y:b.y+b.height}},handleFormatter:function(a){var b=a.shapeArgs||{};a=b.r||0;b=b.width||0;var c=b/2;return[["M",a,0],["L",c-5,0],["A",1,1,0,0,0,c+5,0],["A",1,1,0,0,0,c-5,0],["M",c+5,0],["L",b-a,0]]}}};g.bullet&&(g.bullet.prototype.dragDropProps={x:h.x,y:h.y,target:{optionName:"draggableTarget",axis:"y",move:!0,resize:!0,resizeSide:"top",handlePositioner:function(a){var b=
a.targetGraphic.getBBox();return{x:a.barX,y:b.y+b.height/2}},handleFormatter:h.y.handleFormatter}});g.columnrange&&(g.columnrange.prototype.dragDropProps={x:{axis:"x",move:!0},low:{optionName:"draggableLow",axis:"y",move:!0,resize:!0,resizeSide:"bottom",handlePositioner:function(a){a=a.shapeArgs||a.graphic.getBBox();return{x:a.x,y:a.y+a.height}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a<=b.high}},high:{optionName:"draggableHigh",axis:"y",move:!0,resize:!0,resizeSide:"top",
handlePositioner:function(a){a=a.shapeArgs||a.graphic.getBBox();return{x:a.x,y:a.y}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a>=b.low}}});g.boxplot&&(g.boxplot.prototype.dragDropProps={x:h.x,low:{optionName:"draggableLow",axis:"y",move:!0,resize:!0,resizeSide:"bottom",handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.lowPlot}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a<=b.q1}},q1:{optionName:"draggableQ1",axis:"y",move:!0,resize:!0,
resizeSide:"bottom",handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.q1Plot}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a<=b.median&&a>=b.low}},median:{axis:"y",move:!0},q3:{optionName:"draggableQ3",axis:"y",move:!0,resize:!0,resizeSide:"top",handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.q3Plot}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a<=b.high&&a>=b.median}},high:{optionName:"draggableHigh",axis:"y",move:!0,resize:!0,resizeSide:"top",
handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.highPlot}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a>=b.q3}}});g.ohlc&&(g.ohlc.prototype.dragDropProps={x:h.x,low:{optionName:"draggableLow",axis:"y",move:!0,resize:!0,resizeSide:"bottom",handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.plotLow}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a<=b.open&&a<=b.close}},high:{optionName:"draggableHigh",axis:"y",move:!0,resize:!0,resizeSide:"top",
handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.plotHigh}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a>=b.open&&a>=b.close}},open:{optionName:"draggableOpen",axis:"y",move:!0,resize:!0,resizeSide:function(a){return a.open>=a.close?"top":"bottom"},handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.plotOpen}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a<=b.high&&a>=b.low}},close:{optionName:"draggableClose",axis:"y",move:!0,resize:!0,
resizeSide:function(a){return a.open>=a.close?"bottom":"top"},handlePositioner:function(a){return{x:a.shapeArgs.x,y:a.plotClose}},handleFormatter:h.y.handleFormatter,propValidate:function(a,b){return a<=b.high&&a>=b.low}}});if(g.arearange){A=g.columnrange.prototype.dragDropProps;var J=function(a){a=a.graphic?a.graphic.getBBox().width/2+1:4;return[["M",0-a,0],["a",a,a,0,1,0,2*a,0],["a",a,a,0,1,0,-2*a,0]]};g.arearange.prototype.dragDropProps={x:A.x,low:{optionName:"draggableLow",axis:"y",move:!0,resize:!0,
resizeSide:"bottom",handlePositioner:function(a){return(a=a.lowerGraphic&&a.lowerGraphic.getBBox())?{x:a.x+a.width/2,y:a.y+a.height/2}:{x:-999,y:-999}},handleFormatter:J,propValidate:A.low.propValidate},high:{optionName:"draggableHigh",axis:"y",move:!0,resize:!0,resizeSide:"top",handlePositioner:function(a){return(a=a.upperGraphic&&a.upperGraphic.getBBox())?{x:a.x+a.width/2,y:a.y+a.height/2}:{x:-999,y:-999}},handleFormatter:J,propValidate:A.high.propValidate}}}g.waterfall&&(g.waterfall.prototype.dragDropProps=
{x:h.x,y:p(h.y,{handleFormatter:function(a){return a.isSum||a.isIntermediateSum?null:h.y.handleFormatter(a)}})});if(g.xrange){var K=function(a,b){var c=a.series,d=c.xAxis,f=c.yAxis,e=c.chart.inverted;b=d.toPixels(a[b],!0);var g=f.toPixels(a.y,!0);a=c.columnMetrics?c.columnMetrics.offset:-a.shapeArgs.height/2;e&&(b=d.len-b,g=f.len-g);return{x:Math.round(b),y:Math.round(g+a)}};l=g.xrange.prototype.dragDropProps={y:{axis:"y",move:!0},x:{optionName:"draggableX1",axis:"x",move:!0,resize:!0,resizeSide:"left",
handlePositioner:function(a){return K(a,"x")},handleFormatter:l,propValidate:function(a,b){return a<=b.x2}},x2:{optionName:"draggableX2",axis:"x",move:!0,resize:!0,resizeSide:"right",handlePositioner:function(a){return K(a,"x2")},handleFormatter:l,propValidate:function(a,b){return a>=b.x}}};g.gantt&&(g.gantt.prototype.dragDropProps={y:l.y,start:p(l.x,{optionName:"draggableStart",validateIndividualDrag:function(a){return!a.milestone}}),end:p(l.x2,{optionName:"draggableEnd",validateIndividualDrag:function(a){return!a.milestone}})})}"gauge pie sunburst wordcloud sankey histogram pareto vector windbarb treemap bellcurve sma map mapline".split(" ").forEach(function(a){g[a]&&
(g[a].prototype.dragDropProps=null)});var V={"default":{className:"highcharts-drag-box-default",lineWidth:1,lineColor:"#888",color:"rgba(0, 0, 0, 0.1)",cursor:"move",zIndex:900}},W={className:"highcharts-drag-handle",color:"#fff",lineColor:"rgba(0, 0, 0, 0.6)",lineWidth:1,zIndex:901};e.prototype.setGuideBoxState=function(a,b){var c=this.dragGuideBox;b=p(V,b);a=p(b["default"],b[a]);return c.attr({className:a.className,stroke:a.lineColor,strokeWidth:a.lineWidth,fill:a.color,cursor:a.cursor,zIndex:a.zIndex}).css({pointerEvents:"none"})};
u.prototype.getDropValues=function(a,b,c){var d=this,f=d.series,e=p(f.options.dragDrop,d.options.dragDrop),g={},D=a.points[d.id],h;for(h in c)if(Object.hasOwnProperty.call(c,h)){if("undefined"!==typeof l){var l=!1;break}l=!0}q(c,function(a,c){var h=D[c],m=f[a.axis+"Axis"];m=m.toValue((m.horiz?b.chartX:b.chartY)+D[c+"Offset"]);var k=a.axis.toUpperCase(),n=f[k.toLowerCase()+"Axis"].categories?1:0;n=w(e["dragPrecision"+k],n);var p=w(e["dragMin"+k],-Infinity);k=w(e["dragMax"+k],Infinity);n&&(m=Math.round(m/
n)*n);m=U(m,p,k);l&&a.propValidate&&!a.propValidate(m,d)||"undefined"===typeof h||(g[c]=m)});return g};v.Series.prototype.getGuideBox=function(a){var b=this.chart,c=Infinity,d=-Infinity,f=Infinity,e=-Infinity,g;a.forEach(function(a){(a=a.graphic&&a.graphic.getBBox()||a.shapeArgs)&&(a.width||a.height||a.x||a.y)&&(g=!0,c=Math.min(a.x,c),d=Math.max(a.x+a.width,d),f=Math.min(a.y,f),e=Math.max(a.y+a.height,e))});return g?b.renderer.rect(c,f,d-c,e-f):b.renderer.g()};u.prototype.showDragHandles=function(){var a=
this,b=a.series,c=b.chart,d=c.renderer,f=p(b.options.dragDrop,a.options.dragDrop);q(b.dragDropProps,function(e,g){var h=p(W,e.handleOptions,f.dragHandle),l={className:h.className,"stroke-width":h.lineWidth,fill:h.color,stroke:h.lineColor},m=h.pathFormatter||e.handleFormatter,k=e.handlePositioner,q=e.validateIndividualDrag?e.validateIndividualDrag(a):!0;e.resize&&q&&e.resizeSide&&m&&(f["draggable"+e.axis.toUpperCase()]||f[e.optionName])&&!1!==f[e.optionName]&&(c.dragHandles||(c.dragHandles={group:d.g("drag-drop-handles").add(b.markerGroup||
b.group)}),c.dragHandles.point=a.id,k=k(a),l.d=m=m(a),!m||0>k.x||0>k.y||(l.cursor=h.cursor||"x"===e.axis!==!!c.inverted?"ew-resize":"ns-resize",(h=c.dragHandles[e.optionName])||(h=c.dragHandles[e.optionName]=d.path().add(c.dragHandles.group)),h.translate(k.x,k.y).attr(l),y(h.element,["touchstart","mousedown"],function(b){b=x(b,c);var d=a.series.chart;d.zoomOrPanKeyPressed(b)||(d.mouseIsDown=!1,E(b,a),d.dragDropData.updateProp=b.updateProp=g,a.firePointEvent("dragStart",b),b.stopPropagation(),b.preventDefault())}),
n(c.dragHandles.group.element,"mouseover",function(){c.dragDropData=c.dragDropData||{};c.dragDropData.isHoveringHandle=a.id}),y(c.dragHandles.group.element,["touchend","mouseout"],function(){var b=a.series.chart;b.dragDropData&&a.id===b.dragDropData.isHoveringHandle&&delete b.dragDropData.isHoveringHandle;b.hoverPoint||G(a)})))})};e.prototype.hideDragHandles=function(){this.dragHandles&&(q(this.dragHandles,function(a,b){"group"!==b&&a.destroy&&a.destroy()}),this.dragHandles.group&&this.dragHandles.group.destroy&&
this.dragHandles.group.destroy(),delete this.dragHandles)};n(u,"mouseOver",function(){var a=this;setTimeout(function(){var b=a.series,c=b&&b.chart,d=c&&c.dragDropData,e=c&&c.is3d&&c.is3d();!c||d&&d.isDragging&&d.draggedPastSensitivity||c.isDragDropAnimating||!b.options.dragDrop||e||(c.dragHandles&&c.hideDragHandles(),a.showDragHandles())},12)});n(u,"mouseOut",function(){var a=this;setTimeout(function(){a.series&&G(a)},10)});n(u,"remove",function(){var a=this.series.chart,b=a.dragHandles;b&&b.point===
this.id&&a.hideDragHandles()});e.prototype.zoomOrPanKeyPressed=function(a){var b=this.userOptions.chart||{},c=b.panKey&&b.panKey+"Key";return a[b.zoomKey&&b.zoomKey+"Key"]||a[c]};n(e,"render",function(){this.hasAddedDragDropEvents||T(this)})});r(e,"masters/modules/draggable-points.src.js",[],function(){})});
//# sourceMappingURL=draggable-points.js.map