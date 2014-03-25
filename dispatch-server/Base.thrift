
const string SERVICE_VERSION = "0.0.1";

struct ServiceInfo {
	1: i32 ServiceId,
	2: string Version,
	3: string ServiceName,
	4: string HostName,
	5: i32 ListeningPort
}

#
# Exceptions
# (note that internal server errors will raise a TApplicationException, courtesy of Thrift)
#

/** RPC timeout was exceeded.  either a node failed mid-operation, or load was too high, or the requested op was too large. */
exception TimedOutException {
    1: required string why
}

/** invalid Request  */
exception RequestException {
    1: required string why
}

service BaseService {
	void ConnectDB() throws (1:RequestException re, 2:TimedOutException te),
	i32 Ping(),
	
	/// service
    void ServiceLogin( 1: ServiceInfo s ) throws (1:RequestException re),
    void ServiceLogout( 1: ServiceInfo s ) throws (1:RequestException re),
}


