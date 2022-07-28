let view = null;
(()=>{

let vue = null;
View = function(){

	let sl1 = [{Id:11,Name:"选项一"},{Id:12,Name:"选项二"},{Id:13,Name:"选项三"}],
		sl2 = ["2019","2018","2017","2016","2015"],
		sl3 = ["html5","css3","javascript","cSharp","java","php","python"];

	vue = new Vue({
		el:"#vue",
		data:{
			select:{list1:sl1,list2:sl2,list3:sl3},
			dateObj:{d1:"",d2:"",d3:"",d4:"",d5:""},
			selObj:{s1:"",s2:"",s3:""}
		},
		computed:{
			dateStr(){
				return JSON.stringify(this.dateObj);
			},
			selStr(){
				return JSON.stringify(this.selObj);
			}
		},
		methods:{
			dateC1(v){
				alert("时间选择值为 "+v);
			},
			selC1(v,t){
				alert("下拉选择值为 "+v+",文本为 "+t);
			}
		}
	})

}

})();

view = new View();