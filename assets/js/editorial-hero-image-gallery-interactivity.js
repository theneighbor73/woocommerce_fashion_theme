import { store } from '@wordpress/interactivity';

const heroStates = new WeakMap();
let frameRequested = false;
let resizeFrameRequested = false;

function syncHeroSlides( hero, heroState ) {
	heroState.slides.forEach( ( slide, index ) => {
		const isActive = index === heroState.activeSlide;
		slide.classList.toggle( 'is-active', isActive );

		if ( isActive ) {
			slide.removeAttribute( 'aria-hidden' );
		} else {
			slide.setAttribute( 'aria-hidden', 'true' );
		}
	} );
}

function updateActiveSlides() {
	document.querySelectorAll( '.editorial-hero-image-gallery' ).forEach( ( hero ) => {
		const heroState = heroStates.get( hero );

		if ( ! heroState ) {
			return;
		}

		const heroTop = hero.getBoundingClientRect().top + window.scrollY;
		const stageHeight = Math.max( 1, heroState.stage.offsetHeight );
		const scrolledThroughHero = Math.max( 0, window.scrollY - heroTop );
		// Keep each image active through 95% of its viewport interval.
		const nextSlide = Math.min(
			heroState.slides.length - 1,
			Math.floor( scrolledThroughHero / stageHeight + 0.05 )
		);

		if ( heroState.activeSlide !== nextSlide ) {
			heroState.activeSlide = nextSlide;
			syncHeroSlides( hero, heroState );
		}
	} );
}

function queueHeroUpdate() {
	if ( frameRequested ) {
		return;
	}

	frameRequested = true;
	window.requestAnimationFrame( () => {
		frameRequested = false;
		updateActiveSlides();
	} );
}

function resizeHeroes() {
	document.querySelectorAll( '.editorial-hero-image-gallery' ).forEach( ( hero ) => {
		const heroState = heroStates.get( hero );

		if ( ! heroState ) {
			return;
		}

		const stageHeight = window.innerHeight;
		hero.style.setProperty( '--editorial-hero-image-gallery-stage-height', `${ stageHeight }px` );
		hero.style.setProperty(
			'--editorial-hero-image-gallery-scroll-height',
			`${ ( heroState.slides.length + 1 ) * stageHeight }px`
		);
	} );

	queueHeroUpdate();
}

function queueHeroResize() {
	if ( resizeFrameRequested ) {
		return;
	}

	resizeFrameRequested = true;
	window.requestAnimationFrame( () => {
		resizeFrameRequested = false;
		resizeHeroes();
	} );
}

function initializeHeroes() {
	let initializedHero = false;

	document.querySelectorAll( '.editorial-hero-image-gallery' ).forEach( ( hero ) => {
		if ( heroStates.has( hero ) ) {
			return;
		}

		const stage = hero.querySelector( '.editorial-hero-image-gallery__stage' );
		const slides = Array.from( hero.querySelectorAll( '.editorial-hero-image-gallery__slides .wp-block-image' ) );

		if ( ! stage || slides.length < 2 ) {
			return;
		}

		const heroState = {
			activeSlide: 0,
			slides,
			stage,
		};

		heroStates.set( hero, heroState );
		hero.classList.add( 'is-enhanced' );
		syncHeroSlides( hero, heroState );
		initializedHero = true;
	} );

	if ( initializedHero ) {
		resizeHeroes();
	}
}

store( 'alice/editorial-hero-image-gallery', {
	callbacks: {
		initialize: initializeHeroes,
	},
	actions: {
		queueUpdate: queueHeroUpdate,
		resizeHeroes: queueHeroResize,
	},
} );
