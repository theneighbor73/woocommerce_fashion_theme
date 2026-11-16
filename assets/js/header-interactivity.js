import { store } from '@wordpress/interactivity';

let frameRequested = false;

const { state, actions } = store('alice/header', {
	state: {
		isHidden: false,
		lastScrollY: 0,
	},
	actions: {
		queueHeaderUpdate() {
			if (frameRequested) {
				return;
			}

			frameRequested = true;
			window.requestAnimationFrame(() => {
				frameRequested = false;
				actions.updateHeaderVisibility();
			});
		},
		updateHeaderVisibility() {
			const currentY = window.scrollY;
			const isDesktop = window.matchMedia('(min-width: 64rem)').matches;

			if (!isDesktop || currentY <= 8) {
				state.isHidden = false;
			} else if (currentY > state.lastScrollY + 4) {
				state.isHidden = true;
			} else if (currentY < state.lastScrollY - 4) {
				state.isHidden = false;
			}

			state.lastScrollY = currentY;
		},
		revealHeader() {
			state.isHidden = false;
		},
	},
});
