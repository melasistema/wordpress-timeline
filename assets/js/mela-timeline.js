(function(){
	/**
	 * Vertical Timeline - Thanks to CodyHouse.co
	 * @param element
	 * @constructor
	 */
	function VerticalTimeline( element ) {
		this.element = element;
		this.blocks = this.element.getElementsByClassName("container");
		this.contents = this.element.getElementsByClassName("content");
		this.offset = 0.8;
		this.hideBlocks();
	};

	/**
	 * hide timeline blocks which are outside the viewport
	 */
	VerticalTimeline.prototype.hideBlocks = function() {
		if ( !"classList" in document.documentElement ) {
			return; // check if classList is supported
		}
		/**
		 * Add the slide-in animation to the blocks
		 * @type {VerticalTimeline}
		 */
		let self = this;
		for( let i = 0; i < this.blocks.length; i++) {
			(function(i){
				if( self.blocks[i].getBoundingClientRect().top > window.innerHeight*self.offset ) {
					self.contents[i].classList.add("cd-timeline__content--hidden");
				} else {
					// if block is in the viewport, add the slide-in animation
					if (self.blocks[i].classList.contains('left')) {
						self.blocks[i].classList.add("slide-in-left");
					} else if (self.blocks[i].classList.contains('right')) {
						self.blocks[i].classList.add("slide-in-right");
					}
				}
			})(i);
		}
	};

	/**
	 * Show timeline blocks when scrolling
	 */
	VerticalTimeline.prototype.showBlocks = function() {
		if ( ! "classList" in document.documentElement ) {
			return;
		}
		var self = this;
		for( var i = 0; i < this.blocks.length; i++) {
			(function(i){
				if( self.contents[i].classList.contains("cd-timeline__content--hidden") && self.blocks[i].getBoundingClientRect().top <= window.innerHeight*self.offset ) {
					// add bounce-in animation
					self.contents[i].classList.add("cd-timeline__content--bounce-in");
					self.contents[i].classList.remove("cd-timeline__content--hidden");

					// add slide-in animation
					if (self.blocks[i].classList.contains('left')) {
						self.blocks[i].classList.add("slide-in-left");
					} else if (self.blocks[i].classList.contains('right')) {
						self.blocks[i].classList.add("slide-in-right");
					}
				}
			})(i);
		}
	};

	let verticalTimelines = document.getElementsByClassName("timeline"),
		verticalTimelinesArray = [],
		scrolling = false;
	if( verticalTimelines.length > 0 ) {
		for( let i = 0; i < verticalTimelines.length; i++) {
			(function(i){
				verticalTimelinesArray.push(new VerticalTimeline(verticalTimelines[i]));
			})(i);
		}

		/**
		 * Check if a timeline block is in the viewport
		 */
		window.addEventListener("scroll", function(event) {
			if( !scrolling ) {
				scrolling = true;
				(!window.requestAnimationFrame) ? setTimeout(checkTimelineScroll, 250) : window.requestAnimationFrame(checkTimelineScroll);
			}
		});
	}

	/**
	 * Check if the timeline blocks are in the viewport
	 */
	function checkTimelineScroll() {
		verticalTimelinesArray.forEach(function(timeline){
			timeline.showBlocks();
		});
		scrolling = false;
	};

})();
