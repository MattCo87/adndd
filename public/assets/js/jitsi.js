JitsiMeetJS.init();

const domain = 'meet.jit.si';
		const options = {
			roomName: 'adndd',
			width: '100%',
			height: 700,
			parentNode: meet,
			configOverwrite: {},
			interfaceConfigOverwrite: {}
		};
		const api = new JitsiMeetExternalAPI(domain, options);

