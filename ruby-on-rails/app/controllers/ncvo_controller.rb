class NcvoController < ApplicationController
  def index
    data = cookies[:ncvo_who_am_i]
    if data.kind_of?(String)
      who_am_i = JSON.parse(data)
      if who_am_i.kind_of?(Hash)
        @who_am_i = parse_who_am_i(who_am_i)
      end
    end
  end

  def parse_organisation(data)
    if data.kind_of?(Hash)
      name = data["name"]
      id = data["id"]
      membership_status = data.key?("ncvo_isMembershipOrganisation")
      organisation_state = data["ncvo_organisationState"]
      return Organisation.new(name, id, membership_status, organisation_state)
    end
    nil
  end

  def parse_app_metadata(data)
    if data.kind_of?(Hash)
      manager_flag = data.key?("ncvo_organisationManager")
      organisation = parse_organisation(data["organisation"])

      return AppMetadata.new(manager_flag, organisation)
    end
    nil
  end

  def parse_who_am_i(data)
    if data.kind_of?(Hash)
      name = data["name"]
      email = data["email"]
      uuid = data["uuid"]
      email_verified = data["email_verified"]
      if data["app_metadata"].kind_of?(Hash)
        app_meta_data = parse_app_metadata(data["app_metadata"])
      end

      return WhoAmI.new(name, email, uuid, email_verified, app_meta_data)
    end
    nil
  end
end

# {
# "name": "Toby Verified No Org",
# "email_verified": true,
# "email": "tobias+devverifiednoorg@neontribe.co.uk",
# "uuid": "312684cb-9e7b-ed11-81ad-0022489d6c3b",
# "app_metadata": {
#   "ncvo_organisationManager": false,
#   "organisation": null
# },
# "deprecated": "this endpoint is only maintained to support old systems, no new data will appear here."}

# {
#   "name": "Toby Batch",
#   "email_verified": true,
#   "email": "tobias+dev@neontribe.co.uk",
#   "uuid": "8108c41f-2a1a-ed11-b83e-0022489d6a70",
#   "app_metadata": {
#     "ncvo_organisationManager": false,
#     "organisation": {
#       "name": "NCVO",
#       "id": "1a67652c-c945-e411-b3e9-d89d67649648",
#       "ncvo_isMembershipOrganisation": true,
#       "ncvo_organisationState": "Renewal"
#     }
#   },
#   "deprecated": "this endpoint is only maintained to support old systems, no new data will appear here."
# }

# document.cookie = `ncvo_who_am_i='{"name": "Toby Verified No Org", "email_verified": true, "email": "tobias+devverifiednoorg@neontribe.co.uk", "uuid": "312684cb-9e7b-ed11-81ad-0022489d6c3b", "app_metadata": {"ncvo_organisationManager": false, "organisation": null}, "deprecated": "this endpoint is only maintained to support old systems, no new data will appear here."}''; expires=${new Date(Date.now() + 30*24*60*60*1000).toUTCString()}; path=/;`