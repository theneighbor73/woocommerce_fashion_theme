import { store } from '@wordpress/interactivity';

let frameRequested = false;

const { state, actions } = store('alice/home-hero', {
	state: {
		activeSlide: 0,
		isEnhanced: false,
		slideCount: 0,
	},
	callbacks: {
		initialize() {
			const hero = document.querySelector('.home-hero');

			if (!hero) {
				return;
			}

			state.slideCount = hero.querySelectorAll('.home-hero__slides .wp-block-image').length;

			if (state.slideCount < 2) {
				return;
			}

			state.isEnhanced = true;
			actions.syncSlideState();
			actions.resizeHero();
		},
	},
	actions: {
		queueUpdate() {
			if (frameRequested) {
				return;
			}

			frameRequested = true;
			window.requestAnimationFrame(() => {
				frameRequested = false;
				actions.updateActiveSlide();
			});
		},
		resizeHero() {
			const hero = document.querySelector('.home-hero');
			const stage = hero?.querySelector('.home-hero__stage');

			if (!hero || !stage || state.slideCount < 1) {
				return;
			}

			const stageHeight = window.innerHeight;
			hero.style.setProperty('--home-hero-stage-height', `${stageHeight}px`);
			hero.style.setProperty('--home-hero-scroll-height', `${(state.slideCount + 1) * stageHeight}px`);
			actions.queueUpdate();
		},
		syncSlideState() {
			const hero = document.querySelector('.home-hero');
			const slides = hero?.querySelectorAll('.home-hero__slides .wp-block-image');

			if (!slides) {
				return;
			}

			slides.forEach((slide, index) => {
				const isActive = index === state.activeSlide;
				slide.classList.toggle('is-active', isActive);

				if (state.isEnhanced && !isActive) {
					slide.setAttribute('aria-hidden', 'true');
				} else {
					slide.removeAttribute('aria-hidden');
				}
			});
		},
		updateActiveSlide() {
			const hero = document.querySelector('.home-hero');
			const stage = hero?.querySelector('.home-hero__stage');
			const slideCount = state.slideCount;

			if (!hero || !stage || slideCount < 2) {
				state.activeSlide = 0;
				return;
			}

			const heroTop = hero.getBoundingClientRect().top + window.scrollY;
			const stageHeight = Math.max(1, stage.offsetHeight);
			const scrolledThroughHero = Math.max(0, window.scrollY - heroTop);
			// Keep each image active through 95% of its viewport interval.
			const nextSlide = Math.min(
				slideCount - 1,
				Math.floor(scrolledThroughHero / stageHeight + 0.05),
			);

			if (state.activeSlide !== nextSlide) {
				state.activeSlide = nextSlide;
				actions.syncSlideState();
			}
		},
	},
});
