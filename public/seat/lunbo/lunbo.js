var app = new Vue({
    el: "#app",
    data() {
        return {
            list: [{
                imgUrl: '/index/images/2.jpg',
                text: '未使用',
                div:' filter: drop-shadow( 10px 10px 5px #0c5460);'
            }, {
                imgUrl: '/index/images/3.jpg',
                text: '预约中...',
                style: 'filter: opacity(0.4);'
            }, {
                imgUrl: '/index/images/4.jpg',
                text: '已预约',
                div:'filter: drop-shadow(10px 10px 5px #b04b40)'
            }, {
                imgUrl: '/index/images/5.jpg',
                text: '使用中',
                style: ' filter:grayscale(80%);'
            }, {
                imgUrl: '/index/images/6.jpg',
                text: '离开',
                style: 'filter:blur(3px);'
            }],
            pressList: [{
                name: '1',
                isShow: false
            }, {
                name: '2',
                isShow: false
            }, {
                name: '3',
                isShow: false
            }, {
                name: '4',
                isShow: false
            }, {
                name: '5',
                isShow: false
            }],
            numList: ['p0', 'p1', 'p2', 'p3', 'p4'],
            imgIndex: 0,
            imgTimer: null,
            btnShow: false
        }
    },
    mounted: function() {
        var Item = document.getElementsByClassName('item');
        for (var i = 0; i < Item.length; i++) {
            Item[i].className = 'item ' + this.numList[i]
        }
        this.imgMove()
        this.pressList[0].isShow = true
    },
    methods: {

        imgMove() {
            var Item = document.getElementsByClassName('item');
            this.imgTimer = setInterval(() => {
                this.numList.push(this.numList[0]);
                this.numList.shift()
                this.imgIndex++;
                for (var i = 0; i < Item.length; i++) {
                    Item[i].className = 'item ' + this.numList[i];
                }
                for (var i in this.pressList) {
                    this.pressList[i].isShow = false
                }
                if (this.imgIndex > 4) {
                    this.imgIndex = 0
                    this.pressList[this.imgIndex].isShow = true;
                } else {
                    this.pressList[this.imgIndex].isShow = true;
                }
            }, 5000)
        },
        btnOpen() {
            this.btnShow = true;
            clearInterval(this.imgTimer)
        },
        btnHide() {
            this.btnShow = false;
            this.imgMove()
        },
        leftClick() {
            var Item = document.getElementsByClassName('item');
            this.numList.unshift(this.numList[4]);
            this.numList.pop()
            for (var i = 0; i < Item.length; i++) {
                Item[i].className = 'item ' + this.numList[i];
            }
            for (var i in this.pressList) {
                this.pressList[i].isShow = false
            }
            this.imgIndex--
            if (this.imgIndex < 0) {
                this.imgIndex = 4
                this.pressList[this.imgIndex].isShow = true;
            } else {
                this.pressList[this.imgIndex].isShow = true;
            }
        },
        rightClick() {
            var Item = document.getElementsByClassName('item');
            this.numList.push(this.numList[0]);
            this.numList.shift()
            for (var i = 0; i < Item.length; i++) {
                Item[i].className = 'item ' + this.numList[i];
            }
            for (var i in this.pressList) {
                this.pressList[i].isShow = false
            }
            this.imgIndex++
            if (this.imgIndex > 4) {
                this.imgIndex = 0
                this.pressList[this.imgIndex].isShow = true;
            } else {
                this.pressList[this.imgIndex].isShow = true;
            }
        }
    }
})
