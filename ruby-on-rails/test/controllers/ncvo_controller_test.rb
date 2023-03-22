require "test_helper"

class NcvoControllerTest < ActionDispatch::IntegrationTest
  test "should get index" do
    get ncvo_index_url
    assert_response :success
  end
end
